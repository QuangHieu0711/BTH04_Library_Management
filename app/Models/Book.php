<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'price',
        'quantity',
    ];
    
}
