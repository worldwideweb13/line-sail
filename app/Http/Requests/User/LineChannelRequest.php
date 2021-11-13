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
            'line_channel_name' => 'required|string|between:1,255',
            'line_channel_secret' => 'required|alpha_num|string|size:32',
            'line_access_token' => 'required|string|size:172',
        ];
    }
}