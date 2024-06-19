<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Datvemaybay extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'datvemaybay';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Khóa chính của bảng
    protected $primaryKey = 'madatcho';

    // Khóa chính không phải là auto-incrementing
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'string';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'madatcho',
        'id_kh',
        'id_cb',
        'danhxung',
        'Ho',
        'Tendemvaten',
        'ngaysinh',
        'quoctich',
        'tinhtrangthanhtoan',
        'ngaydat',
    ];

    public function countTickets()
    {
        return $this->hasMany('App\Models\Banggia', 'id_cb', 'id_cb')
                    ->sum('socho');
    }

    public function totalAmount()
    {
        return $this->hasMany('App\Models\Banggia', 'id_cb', 'id_cb')
                    ->sum(DB::raw('socho * gia'));
    }
}

