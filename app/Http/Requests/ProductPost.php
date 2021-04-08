<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
            'pro_name' => 'unique:producers,pro_name',
        ];
    }

    public function messages()
    {
        return  [
            'pro_name.unique'=> 'Đã Tồn Tại Tên Nhà Sản Xuất',
        ];
    }
}
