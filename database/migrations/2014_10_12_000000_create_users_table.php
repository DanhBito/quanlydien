<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30)->uniqe();
            $table->string('password');
            $table->string('fullname', 30);
            $table->string('gender',3)->default('nam');
            $table->date('birth');
            $table->string('address')->nullable($value=true);
            $table->string('identification', 20)->nullable($value=true);
            $table->string('phone', 20);
            $table->string('email')->nullable($value=true);
            $table->date('joining');
            $table->bigInteger('dpm_id')->unsigned();
            $table->foreign('dpm_id')->references('id')->on('departments');
            $table->rememberToken('remember_token', 100);
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
        Schema::dropIfExists('users');
    }
}
