<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\User;

class PlayerController extends Controller
{
    //OBTENER LISTADO DE TODOS LOS USERS
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function playersAll(){
        try {

            $players = User::all();
            return $players;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER USER POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function playerByID(Request $request){
        
        $id = $request->input('id');

        try {
            $player = User::all()
            ->where('id', "=", $id);
            return $player;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //MODIFICAR USER
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function playerUpdate (Request $request){

        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');
        $steamUsername = $request->input('steamUsername');
        $originUsername = $request->input('originUsername');
        $epicgamesUsername = $request->input('epicgamesUsername');
        $battlenetUsername = $request->input('battlenetUsername');
        $riotUsername = $request->input('riotUsername');

        try {

            $player = User::where('id', '=', $id)
            ->update(
                [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role,
                    'steamUsername' => $steamUsername,
                    'originUsername' => $originUsername,
                    'epicgamesUsername' => $epicgamesUsername,
                    'battlenetUsername' => $battlenetUsername,
                    'riotUsername' => $riotUsername
                ]
            );
            return User::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR USER POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function playerDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA EL PLAYER POR ID. SI EXISTE, BORRA EL PLAYER. SI NO, SACA MENSAJE DE ERROR
            $arrayPlayer = User::all()
            ->where('id', '=', $id);

            $player = User::where('id', '=', $id);
            
            if (count($arrayPlayer) == 0) {
                return response()->json([
                    "data" => $arrayPlayer,
                    "message" => "No se ha encontrado el player"
                ]);
            }else{
                $player->delete();
                return response()->json([
                    "data" => $arrayPlayer,
                    "message" => "Player borrado correctamente"
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
