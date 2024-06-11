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
        Schema::create('hotels', function (Blueprint $table) {
            $table->uuid('hotel_id')->primary(); // Khóa chính là UUID
            $table->uuid('provider_id')->nullable(); // UUID nhà cung cấp
            $table->string('name', 100)->nullable(false); // Tên khách sạn, không cho phép null
            $table->string('location', 200)->nullable(false); // Địa điểm, không cho phép null
            $table->text('description')->nullable(); // Mô tả, cho phép null
            $table->decimal('price_per_night', 10, 2)->nullable(false); // Giá mỗi đêm, với 10 chữ số và 2 chữ số sau dấu thập phân, không cho phép null
            $table->integer('availability')->nullable(false); // Số lượng phòng có sẵn, không cho phép null
            $table->dateTime('created_at')->nullable(false); // Thời gian tạo, không cho phép null
            $table->dateTime('updated_at')->nullable(false); // Thời gian cập nhật, không cho phép null

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
