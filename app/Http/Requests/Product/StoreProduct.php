<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:product,name',
            'slug' => 'required|unique:product,slug',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Tên sản phẩm không được để trống',
            'name.unique' => '*Sản phẩm này đã có trong CSDL',
            'slug.required' => '*Url không được để trống',
            'slug.unique' => '*Url này đã có trong CSDL',
            'category_id.required' => '*Danh mục không được để trống',
            'price.required' => '*Giá không được để trống',
            'image.required' => '*Ảnh không được để trống',
            'image.mimes' => '*Không đúng định dạng ảnh',
        ];
    }
}
