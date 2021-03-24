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
                'username'=>'user'.$i,
                'password'=>bcrypt('123456'),
                'nv_id'=>'1',
                'remember_token'=> 'user'.$i,
            ]);
        }

    }
}
