<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    //
    protected $table = 'qualities';

    protected $fillable = [
         'qua_name',
    ];

    public function quality_supplies()
    {
        return $this->hasMany( 'App\Supplies' , 'qua_id', 'id' );
    }
}
