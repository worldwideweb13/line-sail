<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LineChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'line_channel_name' => 'required|string|between:1,255',
            'line_channel_name' => 'required',
            'line_access_token' => 'required|alpha_dash',
            'line_channel_secret' => 'required|alpha_num',
            // 'line_channel_name' => ['required', 'max:100'],
            // 'line_access_token' => ['required', 'alpha_dash', 'size:172'],
            // 'line_channel_secret' => ['required', 'alpha_dash', 'size:32'],
        ];
    }

    //[ *3.追加：Validationメッセージを設定（省略可） ]
    // public function messages()
    // {
    //     return [
    //         'line_channel_name.required'  => 'チャンネル名を入力してください。',
    //         'line_channel_name.max'  => 'チャンネル名は100字以内でお願いします',
    //         // 'line_access_token.required'  => 'ラインアクセストークンを入力してください。',
    //         // 'line_access_token.alpha_dash' => 'ラインアクセストークンは英数字(\'A-Z\',\'a-z\',\'0-9\')とハイフンと下線(\'-\',\'_\')で入力してください。',
    //         // 'line_access_token.size' => 'ラインアクセストークンは172文字です。',
    //         // 'line_channel_secret.required' => 'ラインチャンネルシークレットを入力してください。',
    //         // 'line_channel_secret.alpha_dash' => 'ラインチャンネルシークレットは英数字(\'A-Z\',\'a-z\',\'0-9\')とハイフンと下線(\'-\',\'_\')で入力してください。',
    //         // 'line_channel_secret.size'     => 'ラインチャンネルシークレットは32文字です。',
    //     ];
    // }
}