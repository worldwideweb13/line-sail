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

        // $lineChannelIds = DB::table('line_channels')->where('user_id', '=', 3)->pluck('id')->all();
        /** 
         * userId=3が所有するラインチャンネル AND 左記の条件を満たすチャンネルが所有するチャンネルメッセージのIDリスト
         * */
        // $pushMessages = DB::table('push_messages')->whereHas('line_channels', function (Builder $q) {
        //     $q->where('user_id', 3);
        // })->get();
        // 
        $channelMembers = LineFriend::pluck('id')->all();
        $now = Carbon::today();

        foreach ($pushMessages as $pm) {
            $channelMembers = DB::table('line_channel_line_friend')->where('line_channel_id', '=', $pm['line_channel_id'])->pluck('line_friend_id')->all();
            for ($i = 0; $i < random_int(1, count($channelMembers)); $i++) {
                $DB::table('line_friend_push_message')->insert([
                    'push_message_id' => $pm['id'],
                    'line_friend_id' => $channelMembers[$i],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
