<?php

use Illuminate\Database\Seeder;

class ProducerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 5; $i++) { 
            # code...       
             DB::table('producers')->insert([
                'nsx_ma'=>'nsx'.$i,
                'nsx_ten'=>'NSX Duy Danh'.$i,
                'nsx_diachi'=>'Khánh Hòa',
                'nsx_sdt'=> '098765432'.$i,
                'nsx_email'=> 'abc'.$i,
                'nsx_nhanviendaidien'=> 'Dương Duy Xèng'.$i,
                'kv_id'=>$i,
            ]);
        }
    }
}
