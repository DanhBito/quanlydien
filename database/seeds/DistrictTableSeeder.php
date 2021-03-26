<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('districts')->insert([
            'kv_ten'=>'Tây Bắc Bộ',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Đông Bắc Bộ',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Bắc Trung Bộ',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Nam Trung Bộ',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Tây Nguyên',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Tây Nam Bộ',
        ]);
        DB::table('districts')->insert([
            'kv_ten'=>'Đông Nam Bộ',
        ]);
    }
}
