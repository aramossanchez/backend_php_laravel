<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Party;

class PartyController extends Controller
{
    //OBTENER LISTADO DE TODAS LAS PARTIES
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partiesAll(){
        try {

            $parties = Party::all();
            return $parties;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER PARTY POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partyByID(Request $request){

        $id = $request->input('id');

        try {

            $party = Party::all()
            ->where('id', "=", $id);
            return $party;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //OBTENER PARTY POR ID DE GAME
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partyByGameID(Request $request){

        $id = $request->input('id');

        try {
            $party = Party::selectRaw('parties.name , games.title, players.username')
            ->join('games', 'parties.GameID', '=', 'games.id')
            ->where('parties.GameID', "=", $id)
            ->join('players', 'parties.OwnerID', '=', 'players.id')
            ->get();
            return $party;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //CREAR PARTY
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partyAdd (Request $request){

        $name = $request->input('name');
        $OwnerID = $request->input('OwnerID');
        $GameID = $request->input('GameID');

        try {

            return Party::create(
                [
                    'name' => $name,
                    'OwnerID' => $OwnerID,
                    'GameID' => $GameID
                ]
            );

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            
        }
    }

    //MODIFICAR PARTY
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partyUpdate (Request $request){

        $id = $request->input('id');
        $name = $request->input('name');
        $OwnerID = $request->input('OwnerID');
        $GameID = $request->input('GameID');

        try {

            $party = Party::where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'OwnerID' => $OwnerID,
                    'GameID' => $GameID
                ]
            );
            return Party::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR PARTY POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function partyDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA LA PARTY POR ID. SI EXISTE, BORRA LA PARTY. SI NO, SACA MENSAJE DE ERROR
            $arrayParty = Party::all()
            ->where('id', '=', $id);

            $party = Party::where('id', '=', $id);
            
            if (count($arrayParty) == 0) {
                return response()->json([
                    "data" => $arrayParty,
                    "message" => "No se ha encontrado la party"
                ]);
            }else{
                $party->delete();
                return response()->json([
                    "data" => $arrayParty,
                    "message" => "Party borrada correctamente"
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
