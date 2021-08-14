<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:product',
            'desc' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|gt:0',
            'sale_price' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
        'required' => ':attribute không được để trống',
        'name.unique' => 'Tên sản phẩm đã tồn tại',
        'price.numeric|gt:0' => 'Giá tiền không để là 0',
        ];
    }
    public function attributes() {
        return [
            'name' => 'Tên sản phẩm',
            'desc' => 'Nội dung sản phẩm',
            'category_id' => 'Danh mục',
            'price' => 'Giá tiền',
            'sale_price' => 'Giá khuyến mại có thể bằng 0 và ',
            'image' => 'Ảnh',
        ];
    }
}
