<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'districts';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function provinces(){
        return $this->belongsTo(Province::class, 'province_code', 'code');
        // một quận/huyện thuộc về một tỉnh
        // khóa ngoại là province_id trong bảng districts tương ứng với khóa chính code trong bảng provinces 
    }

    public function wards(){
        return $this->hasMany(Ward::class, 'district_code', 'code');
        // một district có nhiều (wards)
        // khóa ngoại là district_code trong bảng wards tương ứng với khóa chính code trong bảng districts
    }
}

