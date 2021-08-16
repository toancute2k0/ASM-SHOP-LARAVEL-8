<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
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
            'slug' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Tiêu đề không được để trống',
            'slug.required' => '*Url không được để trống',
            'summary.required' => '*Tóm tắt không được để trống',
            'description.required' => '*Nội dung không được để trống',
            'image.required' => '*Ảnh không được để trống',
            'image.mimes' => '*Không đúng định dạng ảnh',
        ];
    }
}
