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
        Schema::create('hang', function (Blueprint $table) {
            $table->integer('id_hang')->primary();
            $table->string('tenhang', 30);
            $table->string('hanhlyxachtay', 30);
            $table->string('hanhlykygui', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hang');
    }
};
