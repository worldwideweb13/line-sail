<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushMessage extends Model
{

    public function next()
    {
        return PushMessage::where('line_channel_id', $this->line_channel_id)->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function prev()
    {
        return PushMessage::where('line_channel_id', $this->line_channel_id)->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    // LineChannelに多対一の関係
    public function lineChannel()
    {
        return $this->belongsTo('App\Models\LineChannel');
    }


    // Pushmessage送信者一覧の管理テーブル
    public function lineFriends()
    {
        return $this->belongsToMany('App\Models\LineFriend')->withTimestamps();
    }
}