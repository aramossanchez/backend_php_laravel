<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Game;

class GameController extends Controller
{
    //OBTENER LISTADO DE TODOS LOS GAMES
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function gamesAll(){
        try {

            $games = Game::all();
            return $games;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER GAME POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function gameByID(Request $request){

        $id = $request->input('id');

        try {
            $game = Game::all()
            ->where('id', "=", $id);
            return $game;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //CREAR GAME
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function gameAdd (Request $request){

        $title = $request->input('title');
        $thumbnail_url = $request->input('thumbnail_url');
        $url = $request->input('url');

        try {

            return Game::create(
                [
                    'title' => $title,
                    'thumbnail_url' => $thumbnail_url,
                    'url' => $url
                ]
            );

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            
        }
    }

    //MODIFICAR GAME
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function gameUpdate (Request $request){

        $id = $request->input('id');
        $title = $request->input('title');
        $thumbnail_url = $request->input('thumbnail_url');
        $url = $request->input('url');

        try {

            $game = Game::where('id', '=', $id)
            ->update(
                [
                    'title' => $title,
                    'thumbnail_url' => $thumbnail_url,
                    'url' => $url
                ]
            );
            return Game::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR GAME POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function gameDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA EL GAME POR ID. SI EXISTE, BORRA EL GAME. SI NO, SACA MENSAJE DE ERROR
            $arrayGame = Game::all()
            ->where('id', '=', $id);

            $game = Game::where('id', '=', $id);
            
            if (count($arrayGame) == 0) {
                return response()->json([
                    "data" => $arrayGame,
                    "message" => "No se ha encontrado el game"
                ]);
            }else{
                $game->delete();
                return response()->json([
                    "data" => $arrayGame,
                    "message" => "Game borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
}
