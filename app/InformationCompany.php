<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinCongTy extends Model
{
    //
    protected $table = 'information_company';

    protected $fillable = [
        'cty_ten', 'cty_diachi', 'cty_sdt', 'cty_email', 'cty_website',
    ];

}
