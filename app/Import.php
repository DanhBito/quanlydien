<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'supplies';

    protected $fillable = [
        'imp_date', 'imp_total','pro_id', 'user_id', 
   ];

   public function producer()
   {
       return $this->belongsTo( 'App\Producer' , 'pro_id', 'id' );
   }

}
