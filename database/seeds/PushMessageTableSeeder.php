<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\PushMessage;


class PushMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pushMessages = [];
        for ($i = 1; $i <= 15; $i++) {
            for ($x = 1; $x <= 15; $x++) {
                $now = Carbon::today()->subDays(16 - $x);
                $pushMessages[] = [
                    'line_channel_id' => $i,
                    'message_text' => "ラインチャンネル No{$i}のメッセージNo.{$x}です。\n\nこちらはプッシュメッセージのテキストサンプルです。テキストメッセージは5000文字以内のメッセージをチャンネルメンバーに配信できます。",
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        PushMessage::insert($pushMessages);
    }
}
