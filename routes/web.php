<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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


Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('admin.index');
    Route::post('user/edit/{user}', [UserController::class, 'edit'])->name('admin.edit');
});



Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth', 'checkAccount')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('/');
    Route::get('/proflie', [AuthController::class, 'profile'])->name('profile');
    Route::post('/proflie', [AuthController::class, 'postProfile'])->name('post.profile');
    Route::get('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::post('/changePassword', [AuthController::class, 'postChangepassword'])->name('post.changePassword');
});
