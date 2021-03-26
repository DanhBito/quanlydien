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
                'pro_name'=>'pro Duy Danh'.$i,
                'pro_address'=>'Khánh Hòa',
                'pro_phone'=> '098765432'.$i,
                'pro_email'=> 'abc'.$i,
                'pro_employee'=> 'Dương Duy Xèng'.$i,
                'dis_id'=>$i,
            ]);
        }
    }
}
