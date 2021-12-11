<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//IMPORTO CONTROLLERS
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//******************//
//ENDPOINTS DE GAMES//
//******************//

//LISTA DE TODOS LOS GAMES
Route::get('games', [GameController::class, "gamesAll"]);

//GAME POR ID
Route::post('gameByID', [GameController::class, "gameByID"]);

//NUEVO GAME
Route::post('newGame', [GameController::class, "gameAdd"]);

//MODIFICAR GAME
Route::put('updateGame', [GameController::class, "gameUpdate"]);

//BORRAR GAME
Route::delete('deleteGame', [GameController::class, "gameDelete"]);