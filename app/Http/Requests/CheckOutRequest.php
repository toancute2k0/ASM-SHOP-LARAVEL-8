<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Vui lòng nhập Họ và Tên!',
            'email.required' => '*Vui lòng nhập Email!',
            'phone.required' => '*Vui lòng nhập Số điện thoại!',
            'address.required' => '*Vui lòng nhập địa chỉ!',
            'payment.required' => '*Vui lòng nhập phương thương thanh toán!',
        ];
    }
}
