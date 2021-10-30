<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushMessage extends Model
{

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
