<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


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
Route::get('/login', [LoginController::class])->name("login");

Route::get('/', function () {
    return view('user/index');
});
Route::get('/matches', function () {
    return view('user/matches');
});
Route::get('/contact', function () {
    return view('user/contact');
});
Route::get('/players', function () {
    return view('user/players');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
