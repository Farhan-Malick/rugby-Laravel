<?php

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
    Route::get('/Admin/Set-up-Teams', [TeamController::class, 'setupTeam']);


    // Create Pool
    Route::get('/Admin/Pool-Listing', [PoolController::class, 'PoolListings']);
    Route::get('/Admin/Pool-Form', [PoolController::class, 'PoolForm']);
    Route::Post('/Admin/CreatePool', [PoolController::class, 'CreatePools']);

});
});
