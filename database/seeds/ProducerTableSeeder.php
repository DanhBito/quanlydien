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
        $faker = Faker\Factory::create();
        for ($i=1; $i < 9; $i++) { 
            # code...       
             DB::table('producers')->insert([
                'pro_name'=>$faker->name,
                'pro_address'=>$faker->country,
                'pro_phone'=> '098765432'.$i,
                'pro_email'=> $faker->email,
                'pro_employee'=> $faker->name,
                'dis_id'=>$faker->numberBetween($min = 1, $max = 7),
            ]);
        }
    }
}
