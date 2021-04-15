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
            'sup_name'  => 'unique:sups,sup_name',
            'sup_price' => 'alpha_num|digits:3,12'
        ];
    }

    public function messages()
    {
        return  [
            'sup_name.unique'     => 'Đã Tồn Tại Đơn Vị Tính',
            'sup_price.alpha_num' =>'Giá Vật Tư Phải Nhập Số!',
            'sup_price.digits'    =>'Giá Vật Tư Nằm Trong Khoảng 0-12 Chữ Số!'
        ];
    }
}
