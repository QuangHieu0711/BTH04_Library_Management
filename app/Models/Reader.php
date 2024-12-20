<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reader extends Model
{
    use HasFactory;
    // Tắt tính năng timestamps
    public $timestamps = false;
    // Thêm _token vào mảng fillable
    protected $fillable = [
        'name',
        'birthday',
        'address',
        'phone',
        '_token', // Thêm dòng này vào
    ];
}
