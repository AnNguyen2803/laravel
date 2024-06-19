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
        Schema::create('datvemaybay', function (Blueprint $table) {
            $table->string('madatcho', 30)->primary();
            $table->integer('id_kh')->unsigned();
            $table->string('id_cb', 30);
            $table->string('danhxung', 10);
            $table->string('Ho', 10);
            $table->string('Tendemvaten', 30);
            $table->date('ngaysinh');
            $table->string('quoctich', 20);
            $table->string('tinhtrangthanhtoan', 10);
            $table->dateTime('ngaydat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datvemaybay');
    }
};
