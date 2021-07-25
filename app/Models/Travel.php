<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table="travels";
    protected $fillable = [
        'name',
        'start_place',
        'from_date',
        'to_date',
        'price',
        'status',
        'transport',
        'type',
        'image',
    ];
    
}
