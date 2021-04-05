<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UpdateUserPost extends FormRequest
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
            //
            'u-phone'    => 'starts_with:0',
            'u-birth'    => 'before:Carbon::now()->subYears(18)',
            'u-joining'  => 'before_or_equal:today',
        ];
    }

    
    public function messages()
    {
        return  [
            'u-birth.before'            => 'Bạn Chưa Đủ 18 Tuổi !',
            'u-phone.starts_with'       => 'Số Điện Thoại Phải Bắt Đầu Bằng Số 0',
            'u-joining.before_or_equal' => 'Ngày Vào Làm Phải Trước Hoặc Bằng Ngày Hôm Nay !',
        ];
    }
}
