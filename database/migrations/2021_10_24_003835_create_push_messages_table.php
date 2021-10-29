<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('line_channel_id');
            $table->text('message_text', 5000);
            $table->timestamps();

            // lineChannelIdの従テーブル。line_channel_idを外部キーにline_channelsのidと紐付け
            $table->foreign('line_channel_id')->references('id')->on('line_channels')->onDelete('cascade');
            $table->unique(['id', 'line_channel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_messages');
    }
}
