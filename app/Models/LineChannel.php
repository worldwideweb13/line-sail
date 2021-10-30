<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineChannel extends Model
{

    // UsersTableに多対一の関係
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // PushMessageTableに一対多の関係
    public function PushMessages()
    {
        return $this->hasMany('app/Models/PushMessage');
    }


    // チャンネルメンバーの管理テーブル
    public function lineFriends()
    {
        return $this->belongsToMany('App\Models\LineFriend')->withTimestamps();
    }
}
