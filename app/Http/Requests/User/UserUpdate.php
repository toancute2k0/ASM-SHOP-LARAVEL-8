<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserUpdate extends FormRequest
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
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Vui lòng nhập Tên!',
            'email.required' => '*Vui lòng nhập Email!',
            'email.unique' => '*Email đã tồn tại!',
            'email.email' => '*Email không đúng định dạng!',
            'password.required' => '*Vui lòng nhập Mật khẩu!',
            'confirm_password.required' => '*Vui lòng nhập Mật khẩu!',
            'confirm_password.same' => '*Mật Khẩu không trung khớp!',
            'address.required' => '*Vui lòng nhập Địa chỉ!',
            'phone.required' => '*Vui lòng nhập số điện thoại!',
        ];
    }
}
