<?php

namespace App\Http\Requests\Caterogy;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $nameRule = Rule::unique((new Category())->getTable());

        if (request()->isMethod('put')) {
            $nameRule->ignore($this->route('category'));
        }
        return [
            'name' => [
                    'required',
                    $nameRule
                ],
            'slug' => 'required',
            'image_category' => 'mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '*Tên sản phẩm không được để trống',
            'name.unique' => '*Sản phẩm này đã có trong CSDL',
            'slug.required' => '*Url không được để trống',
            'image_category.mimes' => '*Không đúng định dạng ảnh',
        ];
    }
}
