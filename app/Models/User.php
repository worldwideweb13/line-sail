<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // LineChannelsの一対多の関係
    public function lineChannels()
    {
        return $this->hasMany('App\Models\LineChannel');
    }

    //確認通知メールをUserに紐付ける
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    //パスワードリセットメールをUserに紐付ける
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    // LineIdが空欄で送られた時、nullに形式を変換する
    public function setLineIdAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['line_id'] = NULL;
        } else {
            $this->attributes['line_id'] = $value;
        }
    }
}
