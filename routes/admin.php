<?php

use App\Http\Controllers\Admin\PicksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PoolController;
use App\Http\Middleware\AdminAuth;


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
Route::group(['middleware' => 'web'], function () {



Route::group(['middleware'=> 'adminauth'], function(){

    // Teams Section
    Route::get('/Admin-Rugby-Portal', [TeamController::class, 'dashboard']);
    Route::get('/Admin/Teams', [TeamController::class, 'allTeams']);
    Route::get('/Admin/add-Teams', [TeamController::class, 'index']);
    Route::post('/Admin/add-team', [TeamController::class, 'store']);
    Route::get('/Admin/Team/delete/{id}', [TeamController::class, 'delete']);

    // Create Pool
    Route::get('/Admin/Pool-Listing', [PoolController::class, 'PoolListings']);
    Route::get('/Admin/Pool-Form', [PoolController::class, 'PoolForm']);
    Route::Post('/Admin/CreatePool', [PoolController::class, 'CreatePools']);


    // All users picks controller


    Route::get('/Admin/Users-picks', [PoolController::class, 'userPicks'])->name('users_picks');

    Route::get('/Admin/Score-chart',[PicksController::class,'ScoreChartForm'])->name('score_chart_form');
    Route::post('Admin/add-score_chart', [PicksController::class, 'store'])->name('save_score_chart');



});
});
