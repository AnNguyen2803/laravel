<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banggia extends Model
{
    // Bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'banggia';

    // Tắt timestamps nếu bảng không có các cột created_at và updated_at
    public $timestamps = false;

    // Định nghĩa khóa chính
    protected $primaryKey = ['id_cb', 'id_hangcho'];

    // Khóa chính không phải là auto-incrementing
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'string';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'id_cb',
        'id_hangcho',
        'socho',
        'gia',
    ];
    // Định nghĩa các mối quan hệ nếu cần
    public function chuyenbay()
    {
        return $this->belongsTo(Chuyenbay::class, 'id_cb', 'id_cb');
    }

    public function hangcho()
    {
        return $this->belongsTo(Hangcho::class,'id_hangcho');
    }

    // Ghi đè phương thức để hỗ trợ khóa chính tổng hợp
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $key) {
            $query->where($key, '=', $this->getAttribute($key));
        }

        return $query;
    }

}
