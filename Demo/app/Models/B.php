<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B extends Model
{
    // bảng B là nhiều
    // Bảng A là 1
    // B nhiều phụ thuộc vào A 
    //A hasMany từ bảng B.
    use HasFactory;
    public function A(){
        return $this->belongsTo('App\A','id_A','id');
    }
}
