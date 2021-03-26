<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ChucVuTableSeeder::class);
        // $this->call(NhanVienTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(InforCompanySeeder::class);
        // $this->call(DistrictTableSeeder::class);
        $this->call(ProducerTableSeeder::class);
    }
}
