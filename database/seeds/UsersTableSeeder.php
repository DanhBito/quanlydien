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
        for ($i=0; $i < 5; $i++) { 
            # code...       
             DB::table('users')->insert([
                'username'=>'username'.$i,
                'password'=>bcrypt('123456'),
                'fullname'=> 'Duy Danh '.$i ,
                'gender'=>'nu',
                'identification' => '123456789'.$i,
                'birth'=>'1999-12-20',
                'address'=>'Khanh Hoa',
                'phone'=>'012345678'.$i,
                'email'=>'abc_'.$i.'@gmail.com',
                'joining'=>'2021-01-01',
                'dpm_id'=>'1',
            ]);
        }

    }
}
