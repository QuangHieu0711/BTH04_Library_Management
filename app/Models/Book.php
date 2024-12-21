<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;;

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
    public function borrows(): HasMany
    {
        return $this->hasMany(Borrow::class);
    }
    
}
