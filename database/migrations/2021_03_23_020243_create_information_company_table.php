<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_company', function (Blueprint $table) {
            $table->id();
            $table->string('cty_ten')->unique();
            $table->string('cty_diachi');
            $table->string('cty_sdt',10);
            $table->string('cty_email');
            $table->string('cty_website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_company');
    }
}
