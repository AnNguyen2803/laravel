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
        Schema::create('car_rentals', function (Blueprint $table) {
            $table->uuid('car_rental_id')->primary(); // Khóa chính là UUID
            $table->uuid('provider_id'); // UUID nhà cung cấp
            $table->string('car_model', 100)->nullable(false); // Mẫu xe, không cho phép null
            $table->decimal('price_per_day', 10, 2)->nullable(false); // Giá thuê mỗi ngày, với 10 chữ số và 2 chữ số sau dấu thập phân, không cho phép null
            $table->integer('availability')->nullable(false); // Số lượng xe có sẵn, không cho phép null
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
        Schema::dropIfExists('car_rentals');
    }
};
