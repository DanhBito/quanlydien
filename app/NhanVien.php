<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = 'nhanvien';
    public $timestamps = false; 

    public function chucvu()
    {
        return $this->belongsTo( 'App\ChucVu' , 'cv_id', 'id' );
    }

    public function user()
    {
        return $this->hasOne( 'App\User' , 'nv_id', 'id' );
    }
}
