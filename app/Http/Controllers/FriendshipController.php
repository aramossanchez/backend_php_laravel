<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Friendship;

class FriendshipController extends Controller
{
    //OBTENER LISTADO DE TODOS LOS FRIENDSHIPS
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipsAll(){
        try {

            $friendships = Friendship::all();
            return $friendships;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER FRIENDSHIP POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipByID(Request $request){

        $id = $request->input('id');

        try {

            $friendship = Friendship::all()
            ->where('id', "=", $id);
            return $friendship;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //OBTENER FRIENDSHIP POR ID DE PLAYER
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipByPlayerID(Request $request){

        $id = $request->input('id');
        //DEVUELVE UN ARRAY CON 2 ARRAYS. CADA ARRAY DE ESOS 2 TIENE LOS USERNAME DE LOS PLAYERS QUE TIENEN FRIENDSHIP CON EL ID BUSCADO
        //(EL ID BUSCADO PUEDE ESTAR EN EL CAMPO PLAYER1 O PLAYER2)
        try {

            $busqueda = array();

            $friendship1 = Friendship::selectRaw('users.username, users.id')
            ->join('users', 'users.id', '=', 'friendships.Player2_ID')
            ->where('friendships.Player1_ID', "=", $id)
            ->get();
            array_push($busqueda, $friendship1);

            $friendship2 = Friendship::selectRaw('users.username, users.id')
            ->join('users', 'users.id', '=', 'friendships.Player1_ID')
            ->where('friendships.Player2_ID', "=", $id)
            ->get();
            array_push($busqueda, $friendship2);
            
            return $busqueda;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //CREAR FRIENDSHIP
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipAdd (Request $request){

        $Player1_ID = $request->input('Player1_ID');
        $Player2_ID = $request->input('Player2_ID');

        try {

            return Friendship::create(
                [
                    'Player1_ID' => $Player1_ID,
                    'Player2_ID' => $Player2_ID
                ]
            );

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            
        }
    }

    //MODIFICAR FRIENDSHIP
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipUpdate (Request $request){

        $id = $request->input('id');
        $Player1_ID = $request->input('Player1_ID');
        $Player2_ID = $request->input('Player2_ID');

        try {

            $friendship = Friendship::where('id', '=', $id)
            ->update(
                [
                    'Player1_ID' => $Player1_ID,
                    'Player2_ID' => $Player2_ID
                ]
            );
            return Friendship::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR FRIENDSHIP POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendshipDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA EL FRIENDSHIP POR ID. SI EXISTE, BORRA EL FRIENDSHIP. SI NO, SACA MENSAJE DE ERROR
            $arrayFriendship = Friendship::all()
            ->where('id', '=', $id);

            $frienship = Friendship::where('id', '=', $id);
            
            if (count($arrayFriendship) == 0) {
                return response()->json([
                    "data" => $arrayFriendship,
                    "message" => "No se ha encontrado el friendship"
                ]);
            }else{
                $frienship->delete();
                return response()->json([
                    "data" => $arrayFriendship,
                    "message" => "Friendship borrado correctamente"
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
