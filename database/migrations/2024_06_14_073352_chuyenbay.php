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
        Schema::create('chuyenbay', function (Blueprint $table) {
            $table->string('id_cb', 30)->primary();
            $table->string('chuyenbay', 15);
            $table->string('thoigianbd', 20);
            $table->string('thoigiankt', 20);
            $table->integer('id_hang');
            $table->integer('id_qd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuyenbay');
    }
};
