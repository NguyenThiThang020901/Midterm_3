<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huou extends Model
{
    use HasFactory;
    protected $table="huous";
    protected $fillable = [
        'name',
        'title',
        'description',
        
       
    ];
}
