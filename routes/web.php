<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PoolController;
use App\Http\Controllers\PickController;
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
// Route::get('/create-pool', function () {
//     return view('user/createPool');
// });
Route::get('/create-pool', [PoolController::class, 'Client_Pool_Show'])->middleware('auth');

Route::get('/set-pool/{pool_id}', [PoolController::class, 'Set_Pool_Show'])->middleware('auth');
Route::post('/set-pool-submit/{pool_id}', [PoolController::class, 'submit_set_Pool']);
Route::get('/myPicks', [PickController::class, 'myPicksTable'])->middleware('auth');
//PROFILE SECTION
Route::get('/profile', [PoolController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('/submit-picks', [PickController::class, 'submitPicks'])->name('submit-picks');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
