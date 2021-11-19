<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
    use HasFactory;
    protected $fillable = ['ten','batdau', 'ketthuc', 'diadiem', 'disan_id'];
    public function disan(){
        return $this->belongsTo(DiSan::class,'disan_id');
    }
}
