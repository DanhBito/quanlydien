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
            'dpm_name'=>'Admin',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Lãnh Đạo',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Quản Lí',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Nhân Viên',
        ]);
    }
}
