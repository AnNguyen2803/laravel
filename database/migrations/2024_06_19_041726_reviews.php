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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Tham chiếu đến id của bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('content'); // Nội dung đánh giá
            $table->unsignedTinyInteger('rating')->nullable(); // Xếp hạng đánh giá từ 1 đến 5
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
