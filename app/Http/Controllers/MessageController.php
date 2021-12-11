<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Message;

class MessageController extends Controller
{
    //OBTENER LISTADO DE TODOS LOS MESSAGES
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messagesAll(){
        try {

            $messages = Message::all();
            return $messages;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER MESSAGE POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messageByID(Request $request){

        $id = $request->input('id');

        try {

            $message = Message::all()
            ->where('id', "=", $id);
            return $message;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //OBTENER MESSAGE POR ID DE PARTY
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messageByPartyID(Request $request){

        $id = $request->input('id');

        try {
            $message = Message::selectRaw('messages.message, players.username, parties.name')
            ->join('parties', 'parties.id', '=', 'messages.PartyID')
            ->where('messages.PartyID', "=", $id)
            ->join('players', 'players.id', '=', 'messages.FromPlayer')
            ->get();
            return $message;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //CREAR MESSAGE
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messageAdd (Request $request){

        $message = $request->input('message');
        $date = $request->input('date');
        $FromPlayer = $request->input('FromPlayer');
        $PartyID = $request->input('PartyID');

        try {

            return Message::create(
                [
                    'message' => $message,
                    'date' => $date,
                    'FromPlayer' => $FromPlayer,
                    'PartyID' => $PartyID
                ]
            );

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            
        }
    }

    //MODIFICAR MESSAGE
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messageUpdate (Request $request){

        $id = $request->input('id');
        $message = $request->input('message');
        $date = $request->input('date');
        $FromPlayer = $request->input('FromPlayer');
        $PartyID = $request->input('PartyID');

        try {

            $message = Message::where('id', '=', $id)
            ->update(
                [
                    'message' => $message,
                    'date' => $date,
                    'FromPlayer' => $FromPlayer,
                    'PartyID' => $PartyID
                ]
            );
            return Message::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR MESSAGE POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messageDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA EL MESSAGE POR ID. SI EXISTE, BORRA EL MESSAGE. SI NO, SACA MENSAJE DE ERROR
            $arraymessage = Message::all()
            ->where('id', '=', $id);

            $message = Message::where('id', '=', $id);
            
            if (count($arraymessage) == 0) {
                return response()->json([
                    "data" => $arraymessage,
                    "message" => "No se ha encontrado el message"
                ]);
            }else{
                $message->delete();
                return response()->json([
                    "data" => $arraymessage,
                    "message" => "Message borrado correctamente"
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
