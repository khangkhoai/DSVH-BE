<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiDiSan extends Model
{
    use HasFactory;
    protected $fillable = ['tenloai'];
}
