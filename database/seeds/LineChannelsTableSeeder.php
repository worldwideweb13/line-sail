<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\LineChannel;


class LineChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LineChannels = [];
        for ($i = 1; $i <= 15; $i++) {
            $LineChannels[] = [
                'user_id' => 3,
                'line_channel_name' => "ラインチャンネル No{$i}",
                'line_channel_secret' => Str::random(32),
                'line_access_token' => Str::random(172),
                'created_at' => Carbon::today()->subDays(101 - $i),
            ];
        }
        LineChannel::insert($LineChannels);
    }
}