<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LineChannelLineFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_channel_line_friend', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('line_channel_id');
            $table->unsignedBigInteger('line_friend_id');
            $table->timestamps();

            // チャンネルメンバーを管理する中間テーブル
            $table->foreign('line_channel_id')->references('id')->on('line_channels')->onDelete('cascade');
            $table->foreign('line_friend_id')->references('id')->on('line_friends')->onDelete('cascade');
            $table->unique(['line_channel_id', 'line_friend_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_channel_line_friend');
    }
}
