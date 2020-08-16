<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, $id)
    {
        if(isset ($request->comentario)){
            $id_user= Auth::user()->id;
            $Comentario = new Comentario;
            $Comentario->conteudo = $request->comentario;
            $Comentario->user_id = $id_user ;
            $Comentario->post_id = $id;
            $Comentario->save();}
            return redirect()->route('home');
    
    
}

}