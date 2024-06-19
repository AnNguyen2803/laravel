<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyenbay extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'chuyenbay';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Khóa chính của bảng
    protected $primaryKey = 'id_cb';

    // Khóa chính không phải là auto-incrementing
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'string';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'id_cb',
        'chuyenbay',
        'thoigianbd',
        'thoigiankt',
        'id_hang',
        'id_qd',
    ];
    public function hang()
    {
        return $this->belongsTo(Hang::class, 'id_hang');
    }

    public function quangduong()
    {
        return $this->belongsTo(Quangduong::class, 'id_qd');
    }

    public function banggia()
    {
        return $this->hasMany(Banggia::class, 'id_cb');
    }
}
