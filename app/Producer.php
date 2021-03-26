<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    //
    protected $table = 'producers';

    protected $fillable = [
         'pro_name', 'pro_address', 'pro_phone', 'pro_email', 'pro_employee',
    ];

    public function district()
    {
        return $this->belongsTo( 'App\District' , 'dis_id', 'id' );
    }
}
