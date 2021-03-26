<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    //
    protected $table = 'producers';

    protected $fillable = [
        'nsx_ma', 'nsx_ten', 'nsx_diachi', 'nsx_sdt', 'nsx_email', 'nsx_nhanviendaidien',
    ];

    public function district()
    {
        return $this->belongsTo( 'App\District' , 'kv_id', 'id' );
    }
}
