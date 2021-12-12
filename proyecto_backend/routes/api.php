<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//IMPORTO CONTROLLERS
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FriendshipController;

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

//**************************//
//ENDPOINTS DE AUTENTICACIÓN//
//**************************//

Route::post('newUser', [AuthController::class, "userRegister"]);
Route::post('loginUser', [AuthController::class, "userLogin"]);

Route::middleware('auth:api')->group(function () {

    //*******************//
    //ENDPOINTS DE PLAYER//
    //*******************//

    // //LISTA DE TODOS LOS PLAYERS
    Route::get('players', [PlayerController::class, "playersAll"]);

    //PLAYER POR ID
    Route::post('playerByID', [PlayerController::class, "playerByID"]);
    
    //MODIFICAR PLAYER
    Route::put('updatePlayer', [PlayerController::class, "playerUpdate"]);
    
    //BORRAR PLAYER
    Route::delete('deletePlayer', [PlayerController::class, "playerDelete"]);

    //*****************//
    //ENDPOINTS DE GAME//
    //*****************//

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

    //******************//
    //ENDPOINTS DE PARTY//
    //******************//

    //LISTA DE TODAS LAS PARTIES
    Route::get('parties', [PartyController::class, "partiesAll"]);

    //PARTY POR ID
    Route::post('partyByID', [PartyController::class, "partyByID"]);

    //PARTY POR ID DE GAME
    Route::post('partyByIDGame', [PartyController::class, "partyByGameID"]);

    //NUEVA PARTY
    Route::post('newParty', [PartyController::class, "partyAdd"]);

    //MODIFICAR PARTY
    Route::put('updateParty', [PartyController::class, "partyUpdate"]);

    //BORRAR PARTY
    Route::delete('deleteParty', [PartyController::class, "partyDelete"]);

    //*********************//
    //ENDPOINTS DE MESSAGES//
    //*********************//

    //LISTA DE TODOS LOS MESSAGES
    Route::get('messages', [MessageController::class, "messagesAll"]);

    //MESSAGE POR ID
    Route::post('messageByID', [MessageController::class, "messageByID"]);

    //MESSAGE POR ID DE PARTY
    Route::post('messageByPartyID', [MessageController::class, "messageByPartyID"]);

    //NUEVO MESSAGE
    Route::post('newMessage', [MessageController::class, "messageAdd"]);

    //MODIFICAR MESSAGE
    Route::put('updateMessage', [MessageController::class, "messageUpdate"]);

    //BORRAR MESSAGE
    Route::delete('deleteMessage', [MessageController::class, "messageDelete"]);

    //*********************//
    //ENDPOINTS DE MEMBERS//
    //*********************//

    //LISTA DE TODOS LOS MEMBERS
    Route::get('members', [MemberController::class, "membersAll"]);

    //MEMBER POR ID
    Route::post('memberByID', [MemberController::class, "memberByID"]);

    //MEMBER POR ID DE PARTY
    Route::post('memberByPartyID', [MemberController::class, "memberByPartyID"]);

    //MEMBER POR ID DE PLAYER
    Route::post('memberByPlayerID', [MemberController::class, "memberByPlayerID"]);

    //NUEVO MEMBER
    Route::post('newMember', [MemberController::class, "memberAdd"]);

    //MODIFICAR MEMBER
    Route::put('updateMember', [MemberController::class, "memberUpdate"]);

    //BORRAR MEMBER
    Route::delete('deleteMember', [MemberController::class, "memberDelete"]);

    //************************//
    //ENDPOINTS DE FRIENDSHIPS//
    //************************//

    //LISTA DE TODOS LOS FRIENDSHIPS
    Route::get('friendships', [FriendshipController::class, "friendshipsAll"]);

    //FRIENDSHIP POR ID
    Route::post('friendshipByID', [FriendshipController::class, "friendshipByID"]);

    //FRIENDSHIP POR ID DE PLAYER
    Route::post('friendshipByPlayerID', [FriendshipController::class, "friendshipByPlayerID"]);

    //NUEVO FRIENDSHIP
    Route::post('newFriendship', [FriendshipController::class, "friendshipAdd"]);

    //MODIFICAR FRIENDSHIP
    Route::put('updateFriendship', [FriendshipController::class, "friendshipUpdate"]);

    //BORRAR FRIENDSHIP
    Route::delete('deleteFriendship', [FriendshipController::class, "friendshipDelete"]);

});