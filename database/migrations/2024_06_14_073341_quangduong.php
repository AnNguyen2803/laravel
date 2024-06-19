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
        Schema::create('quangduong', function (Blueprint $table) {
            $table->integer('id_qd')->primary();
            $table->string('diemkhoihanh', 100);
            $table->string('diemketthuc', 100);
            $table->string('thoigian', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quangduong');
    }
};
