<?php

use Illuminate\Database\Seeder;
use App\Models\LineChannel;
use App\Models\LineFriend;
use Carbon\Carbon;

class LineChannelLineFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // LineChannelTableからidを配列型式で全件取得
        $lineChannelId = LineChannel::pluck('id')->all();
        $lineFriendlId = LineFriend::pluck('id')->all();
        $now = Carbon::today();

        foreach ($lineFriendlId as $i => $friendId) {
            DB::table('line_channel_line_friend')->insert([
                'line_channel_id' => $lineChannelId[array_rand($lineChannelId)],
                'line_friend_id' => $friendId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}