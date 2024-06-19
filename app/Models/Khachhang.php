<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'khachhang';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Khóa chính của bảng
    protected $primaryKey = 'id_kh';

    // Khóa chính là auto-incrementing
    public $incrementing = true;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'int';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'Ho',
        'Tendemvaten',
        'sdt',
        'email',
    ];

    // Định nghĩa các mối quan hệ nếu cần
    public function dondatxes()
    {
        return $this->hasMany(Dondatxe::class, 'id_kh', 'id_kh');
    }
}
