<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::prefix('movies')->group(function () {
    Route::get('create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('store', [MovieController::class, 'store'])->name('movies.store');
    Route::get('eidt/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('update/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::get('show/{movie}', [MovieController::class, 'show'])->name('movies.show');
    Route::delete('delete/{movie}', [MovieController::class, 'destroy'])->name('movies.delete');
});
