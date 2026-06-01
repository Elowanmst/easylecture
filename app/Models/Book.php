<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre',
        'age_range',
        'price',
        'image',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
