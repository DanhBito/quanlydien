<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
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
        for ($i=0; $i < 50; $i++) { 
            # code...       
             DB::table('users')->insert([
                'username'=>$faker->word,
                'password'=>bcrypt('123456'),
                'fullname'=> $faker->name,
                'gender'=>'Nam',
                'identification' => '123456789'.$i,
                'birth'=>'2000-01-01',
                'address'=>$faker->country,
                'phone'=>'012345678'.$i,
                'email'=>$faker->email,
                'joining'=>'2021-01-01',
                'dpm_id'=>$faker->numberBetween($min = 1, $max = 4),
            ]);
        }

    }
}
