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
        DB::table('information_company')->insert([
            'cty_ten' => 'EVN Khánh Hòa',
            'cty_diachi' => '101 Mai Xuân Thưởng, phường Vĩnh Hải, tp.Nha Trang, tỉnh Khánh Hòa',
            'cty_sdt' => '0337136172',
            'cty_email' => '0974619741danh@gmail.com',
            'cty_website' => 'localhost:8000',
        ]);
    }
}
