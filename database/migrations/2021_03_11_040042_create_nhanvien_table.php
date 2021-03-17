<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('nv_ma',10)->unique();
            $table->string('nv_ten',10);
            $table->string('nv_gioitinh',3)->default('nam');
            $table->date('nv_ngaysinh');
            $table->string('nv_diachi');
            $table->string('nv_cmnd',10);
            $table->string('nv_sdt',10);
            $table->string('nv_email');
            $table->date('nv_ngayvaolam');
            $table->bigInteger('cv_id')->unsigned();
            $table->foreign('cv_id')->references('id')->on('chucvu');
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
        Schema::dropIfExists('nhanvien');
    }
}
