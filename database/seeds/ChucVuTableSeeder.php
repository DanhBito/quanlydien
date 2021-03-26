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
        DB::table('departments')->insert([
            'dpm_name'=>'admin',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'lanh dao',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'quan li',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'nhan vien',
        ]);
    }
}
