<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateUser extends FormRequest
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
        $emailRule = Rule::unique((new User)->getTable());

        if (request()->isMethod('put')) {
            // we update user, let's ignore its own email
            // consider your route like : PUT /users/{user}
            $emailRule->ignore($this->route('user'));
        }
        return [
            'name'   =>'required',
            'email' => [
                    'required',
                    'email',
                    $emailRule
                ],
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
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
            'address.required' => '*Vui lòng nhập Địa chỉ!',
            'phone.required' => '*Vui lòng nhập số điện thoại!',
        ];
    }
}
