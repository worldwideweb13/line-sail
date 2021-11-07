<?php

namespace App\Http\Controllers\Api;

use App\Facades\LineBotFacade;
use App\Models\LineChannel;
use App\Http\Controllers\Controller;
use App\Services\Line\Event\FollowService;
use App\Services\Line\Event\RecieveLocationService;
use App\Services\Line\Event\RecieveTextService;
use Illuminate\Http\Request;
use LINE\LINEBot;

class LineBotController extends Controller
{

    /**
     * callback from LINE Message API(webhook)
     * @param Request $request
     * @throws \LINE\LINEBot\Exception\InvalidSignatureException
     */
    public function callback(LineChannel $lineChannel)
    {

        /** @var LINEBot $bot */
        $parameters['line_access_token'] = $lineChannel->line_access_token;
        $parameters['line_channel_secret'] = $lineChannel->line_channel_secret;

        $bot = LineBot::class([$parameters]);

        $signature = $_SERVER['HTTP_' . LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
        if (!LINEBot\SignatureValidator::validateSignature($request->getContent(), env('LINE_CHANNEL_SECRET'), $signature)) {
            abort(400);
        }

        $events = $bot->parseEventRequest($request->getContent(), $signature);
        foreach ($events as $event) {
            $reply_token = $event->getReplyToken();
            $reply_message = 'その操作はサポートしてません。.[' . get_class($event) . '][' . $event->getType() . ']';

            switch (true) {
                    //友達登録＆ブロック解除
                case $event instanceof LINEBot\Event\FollowEvent:
                    $service = new FollowService($bot);
                    $reply_message = $service->execute($event)
                        ? '友達登録されたからLINE ID引っこ抜いたわー'
                        : '友達登録されたけど、登録処理に失敗したから、何もしないよ';

                    break;
                    //メッセージの受信
                case $event instanceof LINEBot\Event\MessageEvent\TextMessage:
                    $service = new RecieveTextService($bot);
                    $reply_message = $service->execute($event);
                    break;

                    //位置情報の受信
                case $event instanceof LINEBot\Event\MessageEvent\LocationMessage:
                    $service = new RecieveLocationService($bot);
                    $reply_message = $service->execute($event);
                    break;

                    //選択肢とか選んだ時に受信するイベント
                case $event instanceof LINEBot\Event\PostbackEvent:
                    break;
                    //ブロック
                case $event instanceof LINEBot\Event\UnfollowEvent:
                    break;
                default:
                    $body = $event->getEventBody();
                    logger()->warning('Unknown event. [' . get_class($event) . ']', compact('body'));
            }

            $bot->replyText($reply_token, $reply_message);
        }
    }
}