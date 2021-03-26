<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //    
    protected $table = 'districts';

    protected $fillable = [
        'kv_ten',
    ];

    public function producer()
    {
        return $this->hasMany( 'App\Producer' , 'kv_id', 'id' );
    }
}
