<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\ScoreController;
use App\Models\teams;
use App\Models\players;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::view('create_match', 'create_match');
Route::post('create_match', [App\Http\Controllers\MatchController::class, 'index']);
Route::get('create_match', [App\Http\Controllers\MatchController::class, 'show_team']);

Route::view('create_team', 'create_team');
Route::post('create_team', [App\Http\Controllers\TeamsController::class, 'index']);

Route::view('create_player', 'create_player');
Route::post('create_player', [App\Http\Controllers\PlayersController::class, 'index']);
Route::get('create_player', [App\Http\Controllers\TeamsController::class, 'show']);

Route::get('view_players/{team_id}', [App\Http\Controllers\TeamsController::class, 'view']);
Route::get('view_players/player_edit/{id}', [App\Http\Controllers\PlayersController::class, 'edit']);
Route::put('view_players/player_edit/player_update', [App\Http\Controllers\PlayersController::class, 'update']);
Route::get('view_players/player_delete/{id}', [App\Http\Controllers\PlayersController::class, 'delete']);

Route::view('create_score_card', 'create_score_card');
Route::get('create_score_card/{match_id}',[App\Http\Controllers\ScoreController::class, 'score'] );
Route::post('create_score_card/create',[App\Http\Controllers\ScoreController::class, 'index'] );
Route::get('create_score_card/edit/{score_id}',[App\Http\Controllers\ScoreController::class, 'edit'] );
Route::post('create_score_card/edit/update',[App\Http\Controllers\ScoreController::class, 'update'] );
Route::get('create_score_card/delete/{score_id}',[App\Http\Controllers\ScoreController::class, 'delete'] );

Route::get('view_score_card/{match_id}',[App\Http\Controllers\ScoreController::class, 'view'] );