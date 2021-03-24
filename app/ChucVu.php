<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    //
    protected $table = 'department';
    public $timestamps = false; 

    public function employee()
    {
        return $this->hasMany( 'App\NhanVien' , 'cv_id', 'id' );
    }
}
