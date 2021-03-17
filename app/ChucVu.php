<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    //
    protected $table = 'chucvu';
    public $timestamps = false; 

    public function nhanvien()
    {
        return $this->hasMany( 'App\NhanVien' , 'cv_id', 'id' );
    }
}
