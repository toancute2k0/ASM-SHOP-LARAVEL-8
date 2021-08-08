<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
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

    public function rules()
    {

        $nameRule = Rule::unique((new Product())->getTable());

        if (request()->isMethod('put')) {
            $nameRule->ignore($this->route('product'));
        }
        return [
            'name' => [
                    'required',
                    $nameRule
            ],
            'slug' => [
                    'required',
                    $nameRule
            ],
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
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
            'image.mimes' => '*Không đúng định dạng ảnh',
        ];
    }
}
