<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;

    Route::get("/", [ReaderController::class,"home"])->name('home');
    Route::prefix('readers')->group(function () {
        Route::get('/', [ReaderController::class, 'index'])->name('reader.index');
        Route::get('/create', [ReaderController::class, 'create'])->name('reader.create');
        Route::post('/store', [ReaderController::class, 'store'])->name('reader.store');
        Route::get('/{name}', [ReaderController::class, 'show'])->name('reader.show');
        Route::get('/{id}/edit', [ReaderController::class, 'edit'])->name('reader.edit');
        Route::put('/{id}', [ReaderController::class, 'update'])->name('reader.update');
    });
    Route::prefix('books')->group(function () {
            Route::get('/', [BookController::class, 'index'])->name('book.index');
            Route::get('/create', [BookController::class, 'create'])->name('book.create');
            Route::post('/store', [BookController::class, 'store'])->name('book.store');
            Route::get('/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
            Route::put('/{id}', [BookController::class, 'update'])->name('book.update');
});
