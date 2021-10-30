<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\LineChannel;


class LineChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineChannels = [];
        for ($i = 1; $i <= 15; $i++) {
            $lineChannels[] = [
                'user_id' => 3,
                'line_channel_name' => "ラインチャンネル No{$i}",
                'line_channel_secret' => Str::random(32),
                'line_access_token' => Str::random(172),
                'created_at' => Carbon::today()->subDays(16 - $i),
            ];
        }
        LineChannel::insert($lineChannels);
    }
}
