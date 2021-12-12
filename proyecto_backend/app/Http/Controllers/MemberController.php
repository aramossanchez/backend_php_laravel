<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Member;

class MemberController extends Controller
{
    //OBTENER LISTADO DE TODOS LOS MEMBERS
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function membersAll(){
        try {

            $members = Member::all();
            return $members;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //OBTENER MEMBER POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberByID(Request $request){

        $id = $request->input('id');

        try {

            $member = Member::all()
            ->where('id', "=", $id);
            return $member;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //OBTENER MEMBER POR ID DE PARTY
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberByPartyID(Request $request){

        $id = $request->input('id');

        try {
            $member = Member::selectRaw('members.id, parties.name, users.username')
            ->join('parties', 'parties.id', '=', 'members.PartyID')
            ->where('members.PartyID', "=", $id)
            ->join('users', 'users.id', '=', 'members.PlayerID')
            ->get();
            return $member;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //OBTENER MEMBER POR ID DE PLAYER
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberByPlayerID(Request $request){

        $id = $request->input('id');

        try {
            $member = Member::selectRaw('members.id, parties.name, users.username')
            ->join('users', 'users.id', '=', 'members.PlayerID')
            ->where('members.PlayerID', "=", $id)
            ->join('parties', 'parties.id', '=', 'members.PartyID')
            ->get();
            return $member;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }

    //CREAR MEMBER
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberAdd (Request $request){

        $PartyID = $request->input('PartyID');
        $PlayerID = $request->input('PlayerID');

        try {

            return Member::create(
                [
                    'PartyID' => $PartyID,
                    'PlayerID' => $PlayerID
                ]
            );

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
            
        }
    }

    //MODIFICAR MEMBER
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberUpdate (Request $request){

        $id = $request->input('id');
        $PartyID = $request->input('PartyID');
        $PlayerID = $request->input('PlayerID');

        try {

            $member = Member::where('id', '=', $id)
            ->update(
                [
                    'PartyID' => $PartyID,
                    'PlayerID' => $PlayerID
                ]
            );
            return Member::all()
            ->where('id', "=", $id);

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

    //BORRAR MEMBER POR ID
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function memberDelete(Request $request){

        $id = $request->input('id');

        try {
            //BUSCA EL MEMBER POR ID. SI EXISTE, BORRA EL MEMBER. SI NO, SACA MENSAJE DE ERROR
            $arrayMember = Member::all()
            ->where('id', '=', $id);

            $member = Member::where('id', '=', $id);
            
            if (count($arrayMember) == 0) {
                return response()->json([
                    "data" => $arrayMember,
                    "message" => "No se ha encontrado el member"
                ]);
            }else{
                $member->delete();
                return response()->json([
                    "data" => $arrayMember,
                    "message" => "Member borrado correctamente"
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
