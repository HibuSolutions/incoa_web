<?php

namespace App\Http\Controllers;
use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{   
    public function index(){
        $comentarios=Comentario::join('users','comentarios.user_id','=','users.id')
        ->select('users.name','users.nie','comentarios.comentario','comentarios.user_id','comentarios.autor','users.apellidos','comentarios.id')
        ->get();
        return view('panel.comentarios.index',compact('comentarios'));
    }
    public function crear(request $request,$id){
        $comentario=new Comentario;
        $comentario->comentario=$request->comentario;
        $comentario->user_id=$id;
        $comentario->autor=auth()->user()->name;
        $comentario->save();
        return redirect('comentarios');
    }

    public function eliminar($id){
        $borra=Comentario::findOrFail($id);
        $borra->delete();
        return redirect('comentarios');
    }
}
