<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePass extends FormRequest
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
            'password' => 'required',
            'new_password' => 'required|different:password',
            'confirm_password' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => '*Vui lòng nhập Mật khẩu!',
            'new_password.required' => '*Vui lòng nhập Mật khẩu!',
            'new_password.different' => '*Mật Khẩu không được giống mật khẩu hiện tại!',
            'confirm_password.required' => '*Vui lòng nhập Mật khẩu!',
            'confirm_password.same' => '*Mật Khẩu không trung khớp!',

        ];
    }
}
