<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'hang';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Khóa chính của bảng
    protected $primaryKey = 'id_hang';

    // Khóa chính không phải là auto-incrementing
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'integer';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'id_hang',
        'tenhang',
        'hanhlyxachtay',
        'hanhlykygui',
    ];
}
