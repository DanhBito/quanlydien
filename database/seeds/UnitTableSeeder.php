<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert([
            'unit_name'     => 'Mét',
            'unit_simplify' => 'm'
        ]);

        DB::table('units')->insert([
            'unit_name'     => 'Cái',
        ]); 
              
         DB::table('units')->insert([
            'unit_name'     => 'Kilogram',
            'unit_simplify' => 'kg'
        ]);    

        DB::table('units')->insert([
            'unit_name'     => 'Tấn',
        ]);  
    }
}
