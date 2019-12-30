<?php

namespace App\Http\Controllers;

use App\Aviso;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $avisos=Aviso::all();
        return view('panel.aviso.index',compact('avisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aviso=new Aviso;
        $aviso->aviso=$request->aviso;
        $aviso->privacidad=$request->privacidad;
        $aviso->importancia=$request->importancia;
        $aviso->save();

        return redirect('aviso')->with('mensaje','aviso notificado  correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function show(Aviso $aviso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aviso $aviso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $borrar=Aviso::findOrFail($id);
      $borrar->delete();
      return redirect('aviso')->with('mensaje','aviso eliminado  correctamente');     
    }
}
