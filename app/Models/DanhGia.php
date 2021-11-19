<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $fillable = ['disan_id', 'danhgia', 'binhluan'];

    public function disan(){
        return $this->belongsTo(DiSan::class,'disan_id');
    }
}
