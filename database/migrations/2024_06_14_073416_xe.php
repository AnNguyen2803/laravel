<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe', function (Blueprint $table) {
            $table->increments('ID_xe');
            $table->string('soxe', 10);
            $table->integer('soghe');
            $table->integer('hanhly');
            $table->integer('ID_NCC')->unsigned();
            $table->integer('ID_LX')->unsigned();
            $table->integer('gia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xe');
    }
};
