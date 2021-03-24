<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ChucVuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('department')->insert([
            'cv_ma'=>'admin',
            'cv_ten'=>'admin',
        ]);
        DB::table('department')->insert([
            'cv_ma'=>'ld',
            'cv_ten'=>'lanh dao',
        ]);
        DB::table('department')->insert([
            'cv_ma'=>'ql',
            'cv_ten'=>'quan li',
        ]);
        DB::table('department')->insert([
            'cv_ma'=>'nv',
            'cv_ten'=>'nhan vien',
        ]);
    }
}
