<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    use HasFactory;
    public $table = 'destination';
    protected $fillable = [
        'time',
        'price',
        'detailes',
        'location',
        'image',
    ];
}
