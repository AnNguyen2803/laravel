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
        Schema::create('flights', function (Blueprint $table) {
            $table->string('flight_id')->primary(); // Khóa chính là UUID
            $table->string('provider_id'); // UUID nhà cung cấp
            $table->string('flight_number', 20)->nullable(false); // Số hiệu chuyến bay, không cho phép null
            $table->string('departure_airport', 100)->nullable(false); // Sân bay khởi hành, không cho phép null
            $table->string('arrival_airport', 100)->nullable(false); // Sân bay đến, không cho phép null
            $table->dateTime('departure_time')->nullable(false); // Thời gian khởi hành, không cho phép null
            $table->dateTime('arrival_time')->nullable(false); // Thời gian đến nơi, không cho phép null
            $table->decimal('price', 10, 2)->nullable(false); // Giá vé, với 10 chữ số và 2 chữ số sau dấu thập phân, không cho phép null
            $table->integer('availability')->nullable(false); // Số lượng vé còn lại, không cho phép null
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
        Schema::dropIfExists('hotels');
    }
};
