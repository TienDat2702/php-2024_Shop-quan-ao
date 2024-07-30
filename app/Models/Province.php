<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'provinces';
    protected $primaryKey = 'code'; 
    public $incrementing = false; //Đặt giá trị này thành false vì code không tự động tăng.

    public function Districts(){
        
        return $this->HasMany(District::class, 'province_code', 'code'); 
        //một tỉnh có nhiều quận/huyện (districts) 
        //khóa ngoại là province_code trong bảng districts tương ứng với khóa chính code trong bảng provinces
    }
}
