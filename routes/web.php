<?php

use App\Http\Controllers\Admin\MatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PoolController;
use App\Http\Controllers\PickController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InviteController;


use Illuminate\Support\Facades\Auth;

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


Route::get('/login', [LoginController::class,'login'])->name("login");

// Route::get('/matches', function () {
//     return view('user/matches');
// });
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
Route::get('/paymentMethod', [PoolController::class, 'paymentMethod'])->middleware('auth');
// Route::post('/paymentMethodViaCard', [PoolController::class, 'paymentMethodViaCard'])->name('paymentMethodViaCard');
Route::post('/paymentMethod', [PoolController::class, 'paymentMethodViaCard'])->name('paymentMethod');

Route::get('/set-pool/{pool_id}', [PoolController::class, 'Set_Pool_Show'])->middleware('auth');
Route::post('/set-pool-submit/{pool_id}', [PoolController::class, 'submit_set_Pool']);
Route::get('/myPicks', [PickController::class, 'myPicksTable'])->name('myPicks')->middleware('auth');

//PROFILE SECTION
Route::get('/profile', [PoolController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('/submit-picks', [PickController::class, 'submitPicks'])->name('submit-picks');

Auth::routes();

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/Dashboard/{pool_id}',[HomeController::class,'detail'])->name('Dashboard');


// join pool section
Route::get('All/Pools',[PoolController::class,'allPools'])->name('all_pools')->middleware('auth');
Route::get('join/Pool/Form/{id}',[PoolController::class,'form'])->name('form')->middleware('auth');
Route::post('join/Pool/save/{id}',[PoolController::class,'saveJoinPool'])->name('Save_JoinPool')->middleware('auth');
// Route::get('/pool/{pool_id}', [PoolController::class, 'viewPoolData'])
//     ->name('view-pool-data');
Route::get('/Dashboard/{pool_id}/pool/{created_pool_id}', [PoolController::class, 'viewPoolData'])->name('view-pool-data');

// Route::get('/Dashboard/{first_name}/{last_name}/{pool_id}', [PoolController::class, 'viewPoolData'])->name('view-pool-data');

Route::get('matches',[MatchController::class,'upCommingMatches']);


Route::get('{first_name}-{last_name}/pool/{pool_id}', [PoolController::class, 'poolData'])->name('pool.show');


Route::get('/invite-friends/{pool_id}', [InviteController::class,'showInviteForm'])->name('invite.friends');

Route::post('/send-invitation', [InviteController::class,'sendInvitation'])->name('send.invitation');


