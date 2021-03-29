<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinCongTy extends Model
{
    //
    protected $table = 'informations';

    protected $fillable = [
        'inf_name', 'inf_address', 'inf_phone', 'inf_email', 'inf_website',
    ];

}
