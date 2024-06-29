<?php

use App\Http\Controllers\Admin\JoinedPoolsController;
use App\Http\Controllers\Admin\PicksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PoolController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\Admin\MatchController;




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
    Route::get('/Admin-Rugby-Portal', [TeamController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/Admin/Teams', [TeamController::class, 'allTeams']);
    Route::get('/Admin/add-Teams', [TeamController::class, 'index']);
    Route::post('/Admin/add-team', [TeamController::class, 'store']);
    Route::get('/Admin/Team/delete/{id}', [TeamController::class, 'delete']);
    Route::get('/Admin/Set-up-Teams', [TeamController::class, 'setupTeam']);



    // Create Pool
    Route::get('/Admin/Pool-Listing', [PoolController::class, 'PoolListings']);
    Route::delete('/Admin/Pool-Listing/{id}', [PoolController::class, 'destroyPool'])->name('pool.destroy');

    Route::get('/Admin/Pool-Form', [PoolController::class, 'PoolForm']);
    Route::Post('/Admin/CreatePool', [PoolController::class, 'CreatePools']);
    Route::get('Admin/Users-picks',[PoolController::class,'userPicks'])->name('users_picks');
    Route::get('Admin/score_chart_form/{id}',[PicksController::class,'ScoreChartForm'])->name('score_chart_form');

    Route::post('Admin/save_score_chart/{id}',[PicksController::class,'updateScoreChart'])->name('save_score_chart');




    // matches route

    // Route::get('/matches', [MatchController::class, 'index']);
Route::get('/matches/create', [MatchController::class, 'create'])->name('create_match');
Route::post('/matches', [MatchController::class, 'store']);
Route::get('/All-Schedule-Matches', [MatchController::class, 'scheduledMatches'])->name('scheduled');
// Route::get('/matches/{id}/edit', [MatchController::class, 'edit']);
// Route::put('/matches/{id}', [MatchController::class, 'update']);
Route::delete('/matches/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');

Route::get('All/users/joined/pools',[JoinedPoolsController::class,'index'])->name('users_joined_pools_index');

Route::get('/Accouncements/announceTeam', [MatchController::class, 'announce'])->name('announceTeam');
Route::get('/Accouncements/TeamScores', [MatchController::class, 'TeamScores'])->name('TeamScores');
Route::post('/Accouncements/updateTeamScores/{id}', [MatchController::class, 'updateTeamScores'])->name('updateTeamScores');
Route::get('/Accouncements/editTeamScores/{id}', [MatchController::class, 'editTeamScores'])->name('editTeamScores');

// In your web.php file or routes file
// Route::get('/pick-teams', [MatchController::class, 'index'])->name('pick-teams');
Route::post('/pick-teams', [MatchController::class, 'handleTeamSelection'])->name('pick-teams');
Route::post('/announce-winner', [MatchController::class, 'announceWinner'])->name('announce-winner');

// Route::post('/pick-teams', [MatchController::class, 'handleTeamSelection'])->name('Pick-Teams');
// Route::post('/announce-winner', [MatchController::class, 'announceWinner'])->name('announce-winner');


Route::get('/Set-Spreads/Bonus-points', [MatchController::class, 'SetBonusPoints'])->name('SetBonusPoints');

Route::post('/Set-Spreads/Bonus-points', [MatchController::class, 'storeBonusPoints']);

// New routes for update bonus points
Route::get('/Set-Spreads/Bonus-points/{id}/edit', [MatchController::class, 'editBonusPoints'])->name('editBonusPoints');
Route::post('/Set-Spreads/Bonus-points/{id}', [MatchController::class, 'updateBonusPoints'])->name('Set-Spreads/Bonus-points');
});
});
