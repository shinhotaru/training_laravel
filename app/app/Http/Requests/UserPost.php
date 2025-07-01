<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPost extends FormRequest
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
            'user_name' => 'required|max:255',
            'user_name_kana' => 'regex:/^[ァ-ヶー 　]+$/u|max:255',
            'gender' => 'in:male,female',
            'age' => 'nullable|numeric|between:0,120',
            'mail_address' => 'nullable|email:rfc',
        ];
    }

    /**
     * messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_name.required' => '名前は必須です',
            'user_name.max' => '名前は最大255文字で入力してください',
            'user_name_kana.regex' => '名前カナは全角カタカナで入力してください',
            'user_name_kana.max' => '名前カナは最大255文字で入力してください',
            'gender.in'  => '性別が不正です',
            'age.between' => '年齢は0以上120以下で入力してください',
            'mail_address.email' => 'メールアドレスが不正です'
        ];
    }

}
