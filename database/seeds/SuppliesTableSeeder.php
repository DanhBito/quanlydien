<?php

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 40; $i++) { 
            # code...       
             DB::table('supplies')->insert([
                'sup_name'=>$faker->lastName,
                'sup_price'=>$faker->randomNumber,
                'unit_id'=>$faker->numberBetween($min = 1, $max = 4),
                'qua_id'=>$faker->numberBetween($min = 1, $max = 5),
                'pro_id'=>$faker->numberBetween($min = 1, $max = 20),
            ]);
        }
    }
}
