<?php

use Illuminate\Database\Seeder;

class InforCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('informations')->insert([
            'inf_name' => 'EVN Khánh Hòa',
            'inf_address' => '101 Mai Xuân Thưởng, phường Vĩnh Hải, tp.Nha Trang, tỉnh Khánh Hòa',
            'inf_phone' => '0337136172',
            'inf_email' => '0974619741danh@gmail.com',
            'inf_website' => 'localhost:8000',
        ]);
    }
}
