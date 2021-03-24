<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = 'employee';
    public $timestamps = false; 

    protected $fillable = [
        'nv_ma', 'nv_ten', 'nv_gioitinh', 'nv_ngaysinh', 'nv_diachi', 'nv_cmnd', 'nv_sdt', 'nv_email', 'nv_ngayvaolam', 'cv_id',
    ];

    public function chucvu()
    {
        return $this->belongsTo( 'App\ChucVu' , 'cv_id', 'id' );
    }

    public function user()
    {
        return $this->hasOne( 'App\User' , 'nv_id', 'id' );
    }
}
