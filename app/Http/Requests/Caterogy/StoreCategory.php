<?php

namespace App\Http\Requests\Caterogy;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'name' => 'required|unique:category,name',
            'slug' => 'required|unique:category,slug',
            'image_category' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Tên danh mục không được để trống',
            'name.unique' => '*Danh mục này đã có trong CSDL',
            'slug.required' => '*Url không được để trống',
            'slug.unique' => '*Url này đã có trong CSDL',
            'image_category.required' => '*Ảnh không được để trống',
            'image_category.mimes' => '*Không đúng định dạng ảnh',
        ];
    }
}
