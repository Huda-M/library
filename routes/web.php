<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.register');
});
Route::middleware('auth')->group(function () {
    Route::get('/my-books', [BookController::class, 'myBooks'])->name('my.books');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/borrows', [BorrowController::class, 'adminBorrows'])->name('admin.borrows');
    });
});


Route::middleware('auth')->group(function () {
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::patch('/return/{book}', [BookController::class, 'returnBook'])->name('books.return');
});
});
Route::middleware('auth')->group(function () {
    Route::prefix('borrow')->group(function () {
        Route::post('/{book}', [BorrowController::class, 'store'])->name('borrow.store');
    });
});



Route::middleware('auth')->group(function () {
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/{user}/borrows', [UserController::class, 'userBorrows'])->name('users.borrows');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
});
Route::middleware('auth')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}/borrows', [UserController::class, 'userBorrows'])->name('users.borrows');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__.'/auth.php';
