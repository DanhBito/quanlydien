<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->id();
            $table->string('nsx_ma',10)->unique();
            $table->string('nsx_ten',100);
            $table->string('nsx_diachi');
            $table->char('nsx_sdt',10);
            $table->string('nsx_email');
            $table->string('nsx_nhanviendaidien',100);
            $table->bigInteger('kv_id')->unsigned();
            // $table->foreign('kv_id')->references('id')->on('districts');
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
        Schema::dropIfExists('producers');
    }
}
