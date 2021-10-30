<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineFriend extends Model
{
    protected $fillable = ['line_id', 'display_name'];


    // チャンネルメンバーの管理テーブル
    public function lineChannels()
    {
        return $this->belongsToMany('App\Models\LineChannel')->withTimestamps();
    }

    // Pushmessage送信者一覧の管理テーブル
    public function PushMessages()
    {
        return $this->belongsToMany('App\Models\PushMessage')->withTimestamps();
    }
}
