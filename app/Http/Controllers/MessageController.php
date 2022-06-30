<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageContact;
use Error;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller{

    public function send(Request $request)
    {
        MessageContact::create($request->all());
    
    }

    public function index()
    {
       return MessageContact::all();
    }

    public function show($id)
    {
        $message = MessageContact::where('contact_id', $id)

        ->get();
        return new JsonResponse($message);
    }

    public function update(Request $request, $id)
    {
        $message=MessageContact::find($id);
        try {
        $message-> update([
            'message'=>$request->message,
        ]);
            return new JsonResponse("Mensagem Atualizada.");
        } 
        catch (Error){
            return new JsonResponse("Mensagem inexistente.");
        }
    }

    public function destroy($id)
    {
        $message=MessageContact::destroy($id);
        return new JsonResponse("Mensagem deletada.");
    }
}
