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
        Schema::create('dondatxe', function (Blueprint $table) {
            $table->string('madatcho', 30)->primary();
            $table->integer('ID_xe')->unsigned();
            $table->integer('id_kh')->unsigned();
            $table->string('danhxung', 10);
            $table->string('Hotentaixe', 50);
            $table->string('sdt', 15);
            $table->string('tinhtrangthanhtoan', 10);
            $table->dateTime('ngaydat');
            $table->string('diemdonxe', 100);
            $table->string('diemtraxe', 100);
            $table->string('ngaygiobd', 100);
            $table->string('ngaygiokt', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dondatxe');
    }
};
