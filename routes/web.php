<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BorrowController;

    Route::get("/", [ReaderController::class,"home"])->name('home');
    Route::prefix('readers')->group(function () {
        Route::get('/', [ReaderController::class, 'index'])->name('reader.index');
        Route::get('/create', [ReaderController::class, 'create'])->name('reader.create');
        Route::post('/store', [ReaderController::class, 'store'])->name('reader.store');
        Route::get('/{name}', [ReaderController::class, 'show'])->name('reader.show');
        Route::get('/{id}/edit', [ReaderController::class, 'edit'])->name('reader.edit');
        Route::put('/{id}', [ReaderController::class, 'update'])->name('reader.update');
        Route::delete('/{id}', [ReaderController::class, 'destroy'])->name('reader.destroy');
    });
    Route::prefix('books')->group(function () {
            Route::get('/', [BookController::class, 'index'])->name('book.index');
            Route::get('/create', [BookController::class, 'create'])->name('book.create');
            Route::post('/store', [BookController::class, 'store'])->name('book.store');
            Route::get('/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
            Route::put('/{id}', [BookController::class, 'update'])->name('book.update');
            Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('book.destroy');

    });

Route::prefix('borrows')->group(function () {
    Route::get('/', [BorrowController::class, 'index'])->name('borrow.index');
    Route::get('/create', [BorrowController::class, 'create'])->name('borrow.create');
    Route::post('/store', [BorrowController::class, 'store'])->name('borrow.store');
    Route::get('/{id}/edit', [BorrowController::class, 'edit'])->name('borrow.edit');
    Route::put('/{id}', [BorrowController::class, 'update'])->name('borrow.update');
    Route::delete('/{id}', [BorrowController::class, 'destroy'])->name('borrow.destroy');
    Route::get('borrow/searchByReaderName', [BorrowController::class, 'searchByReaderName'])->name('borrow.searchByReaderName');
    Route::put('/borrows/{id}/update-status', [BorrowController::class, 'updateStatus'])->name('borrow.updateStatus');
    Route::get('/borrows/history/{reader_id}', [BorrowController::class, 'history'])->name('borrow.history');
});
