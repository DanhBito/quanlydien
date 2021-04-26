<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $table = 'supplies';

    protected $fillable = [
         'sup_name', 'sup_amount','sup_price', 'unit_id', 'qua_id', 'pro_id', 
    ];

    public function unit()
    {
        return $this->belongsTo( 'App\Unit' , 'unit_id', 'id' );
    }

    public function quality()
    {
        return $this->belongsTo( 'App\Quality' , 'qua_id', 'id' );
    }

    public function producer()
    {
        return $this->belongsTo( 'App\Producer' , 'pro_id', 'id' );
    }

}
