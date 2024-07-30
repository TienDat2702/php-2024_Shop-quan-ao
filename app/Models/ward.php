<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'wards';
    protected $primaryKey = 'code';
    public $incrementing = false; // Đặt giá trị này thành false vì code không tự động tăng.

    public function districts(){
        return $this->belongsTo(District::class, 'district_code', 'code');
        // một ward thuộc về một district
        // khóa ngoại là district_id trong bảng wards tương ứng với khóa chính code trong bảng districts
    }
}

