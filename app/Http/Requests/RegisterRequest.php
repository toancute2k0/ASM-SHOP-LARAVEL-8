<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'   =>'required',
            'email'  =>'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Vui lòng nhập Tên!',
            'email.required' => '*Vui lòng nhập Email!',
            'email.unique' => '*Email dã tồn tại!',
            'email.email' => '*Email không đúng định dạng!',
            'password.required' => '*Vui lòng nhập Mật khẩu!',
            'confirm_password.same' => '*Mật khẩu không trùng khớp!',
            'confirm_password.required' => '*Vui lòng nhập mật khẩu xác nhận!',
            'address.required' => '*Vui lòng nhập Địa chỉ!',
            'phone.required' => '*Vui lòng nhập số điện thoại!',
        ];
    }
}
