<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'nhacungcap';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Khóa chính của bảng
    protected $primaryKey = 'ID_NCC';

    // Khóa chính là auto-incrementing
    public $incrementing = true;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'int';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'TenNCC',
    ];
}
