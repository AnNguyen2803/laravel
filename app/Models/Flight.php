<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'provider_id',
        'flight_number',
        'departure_airport',
        'arrival_airport',
        'departure_time',
        'arrival_time',
        'price',
        'availability'
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         // Nếu provider_id chưa được thiết lập, đặt giá trị mặc định
    //         if (is_null($model->provider_id)) {
    //             $model->provider_id = 'PRO001';
    //         }
    //     });
    // }


}
