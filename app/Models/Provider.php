<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'providers';

    // Khóa chính của bảng
    protected $primaryKey = 'id';

    // Loại khóa chính
    protected $keyType = 'string';

    // Tắt tự động tăng của khóa chính
    public $incrementing = false;

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'id',
        'name',
        'contact_info',
        'address',
        'email',
        'phone',
        'rating',
    ];
}
