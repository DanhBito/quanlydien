<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliesPost extends FormRequest
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
            'sup_price' => 'max:12|numeric '
        ];
    }

    public function messages()
    {
        return  [
            'sup_price.max' => 'Giá Vật Tư Phải Nhập Số!',
            'sup_price.numeric'     => 'Giá Vật Tư Nằm Trong Khoảng 0-12 Chữ Số!'
        ];
    }
}
