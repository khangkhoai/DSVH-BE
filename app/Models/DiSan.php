<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiSan extends Model
{
    use HasFactory;
    protected $fillable = ['ten','mota', 'anh', 'video', 'audio', 'luotxem', 'loai_id', 'cap_id', 'diadiem', 'xa', 'huyen'];

    public function loaidisan(){
        return $this->belongsTo(LoaiDiSan::class,'loai_id');
    }
    public function capdisan(){
        return $this->belongsTo(CapDiSan::class,'cap_id');
    }
    
    
}
