<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    use HasFactory;

    
    public $incrementing = false; // Bỏ tính năng tự tăng cho khóa chính
    protected $keyType = 'string'; // Định dạng kiểu dữ liệu cho khóa chính là string

    protected $fillable = [
        'id',
        'provider_id',
        'car_model',
        'price_per_day',
        'availability',
        'created_at',
        'updated_at'
    ];

    // protected $casts = [
    //     'price_per_day' => 'decimal:2',
    //     'availability' => 'integer'
    // ];
}
