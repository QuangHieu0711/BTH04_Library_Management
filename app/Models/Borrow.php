<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Reader;  
use App\Models\Book;

class Borrow extends Model
{
     // Tắt tính năng tự động quản lý timestamps
     public $timestamps = false;
    //
     // Các thuộc tính có thể được gán giá trị hàng loạt
     protected $fillable = [
        'reader_id',
        'book_id',
        'borrow_date',
        'return_date',
        'status'
    ];

    // Định nghĩa mối quan hệ với model Reader
    public function reader(): BelongsTo
    {
        return $this->belongsTo(Reader::class);
    }

    // Định nghĩa mối quan hệ với model Book
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

}
