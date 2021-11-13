<?php

use Illuminate\Database\Seeder;
use App\Models\LineFriend;
use App\Models\PushMessage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class LineFriendPushMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // $pushMessages = DB::table('push_messages')->whereHas('line_channels', function (Builder $q) {
        //     $q->where('user_id', 3);
        // })->get();

        /** 
         * userId=3のプッシュメッセージリスト
         * @return Array([record],...)
         * */
        $pushMessages = PushMessage::select()
            ->join('line_channels', 'line_channels.id', '=', 'push_messages.line_channel_id')
            ->where('user_id', 3)
            ->get();

        //line_friendテーブルからfriend_idを全件取得
        $channelMembers = LineFriend::pluck('id')->all();
        $now = Carbon::today();

        foreach ($pushMessages as $pm) {
            //lineチャンネル毎の友達一覧(friend_id)を取得
            $channelMembers = DB::table('line_channel_line_friend')->where('line_channel_id', '=', $pm['line_channel_id'])->pluck('line_friend_id')->all();
            // 友達の人数を上限に友達とプッシュメッセージを紐付ける
            for ($i = 0; $i < random_int(1, count($channelMembers)); $i++) {

                $setVal1 = $pm['id'];
                $setVal2 = $channelMembers[$i];

                // クエリビルダを利用し、現在までの複合主キーと重複するかを確認
                $CheckVal = DB::table('line_friend_push_message')
                    ->where([
                        ['push_message_id', '=', $setVal1],
                        ['line_friend_id', '=', $setVal2]
                    ])->get();

                // 重複がなければ中間テーブルにデータ挿入
                if ($CheckVal->isEmpty()) {
                    DB::table('line_friend_push_message')->insert([
                        'push_message_id' => $setVal1,
                        'line_friend_id' => $setVal2,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
    }
}