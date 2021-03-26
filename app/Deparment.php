<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
    //
        //
        protected $table = 'departments';
    
        public function user()
        {
            return $this->hasMany( 'App\User' , 'dpm_id', 'id' );
        }
}
