<?php

namespace App\Http\Controllers;

use App\Noticia;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $noticias=Noticia::join('users','noticias.user_id','=','users.id')
    ->select('users.name','noticias.user_id','noticias.noticia','noticias.foto','noticias.created_at','noticias.titulo','noticias.id')
    ->get();
        return view('panel.noticia.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('panel.noticia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if($request->hasFile('foto')){
        $rutaImagen=$request->file('foto')->store('noticia');
        $noticia=new Noticia;
        $noticia->noticia=$request->noticia;
        $noticia->user_id=auth()->user()->id;
        $noticia->titulo=$request->titulo;
        $noticia->foto=$rutaImagen;
        $noticia->save();
        }else{
        $noticia=new Noticia;
        $noticia->noticia=$request->noticia;
        $noticia->user_id=auth()->user()->id;
        $noticia->titulo=$request->titulo;
        $noticia->save();    
        }
        
        return redirect('noticia')->with('mensaje','noticia publicada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $id =  Crypt::decrypt($id);  
        $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
        ->where('users.id','=',$id)
        ->get();
        $roles = Role::all()->pluck('name', 'id');
        return view('panel.noticia.ver',compact('usuario','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $id=Crypt::decrypt($id);
        $noticia=Noticia::findOrFail($id);
        return view('panel.noticia.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->hasFile('foto')){
        $borrar=Noticia::findOrFail($id);
        Storage::disk('local')->delete('app',$borrar->foto);   
        $rutaImagen=$request->file('foto')->store('noticia');
        $noticia=Noticia::findOrFail($id);
        $noticia->noticia=$request->noticia;
        $noticia->user_id=auth()->user()->id;
        $noticia->titulo=$request->titulo;
        $noticia->foto=$rutaImagen;
        $noticia->save();    
        }else{
        $noticia=Noticia::findOrFail($id);
        $noticia->noticia=$request->noticia;
        $noticia->user_id=auth()->user()->id;
        $noticia->titulo=$request->titulo;
        $noticia->save();   
        }

        return redirect('noticia')->with('mensaje','noticia actualizada correctamente');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia=Noticia::findOrFail($id);
        Storage::disk('local')->delete('app',$noticia->foto);
        $noticia->delete();
        return redirect('noticia')->with('mensaje','noticia eliminada correctamente');
    }
}
