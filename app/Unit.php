<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'units';

    protected $fillable = [
         'unit_name', 'unit_simplify',
    ];

    public function unit_supplies()
    {
        return $this->hasMany( 'App\Supplies' , 'unit_id', 'id' );
    }
}
