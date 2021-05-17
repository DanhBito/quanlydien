<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_exports', function (Blueprint $table) {
            $table->id();
            $table->integer('di_amount');
            $table->decimal('di_price', $precision = 20, $scale = 0);
            $table->decimal('di_into_money', $precision = 20, $scale = 0);
            $table->bigInteger('sup_id')->unsigned();
            $table->foreign('sup_id')->references('id')->on('supplies');
            $table->bigInteger('exp_id')->unsigned();
            $table->foreign('exp_id')->references('id')->on('exports');
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
        Schema::dropIfExists('detail_exports');
    }
}
