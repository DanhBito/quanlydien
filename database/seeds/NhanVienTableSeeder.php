<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NhanVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2; $i < 5; $i++) { 
            # code...
            DB::table('employee')->insert([
                'nv_ma'=>'nv'.$i,
                'nv_ten'=> 'Duy Danh '.$i ,
                'nv_gioitinh'=>'nu',
                'nv_ngaysinh'=>'1999-12-20',
                'nv_diachi'=>'Khanh Hoa',
                'nv_cmnd'=> '12345678'.$i,
                'nv_sdt'=>'012345678'.$i,
                'nv_email'=>'abc_'.$i,
                'nv_ngayvaolam'=>'2021-01-01',
                'cv_id'=>'2',
            ]);    
        }
    }
}
