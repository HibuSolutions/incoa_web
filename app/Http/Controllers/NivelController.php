<?php

namespace App\Http\Controllers;
use App\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function crear(request $request){
    	$nivel=new Nivel;
    	$nivel->nameNivel=$request->nombre;
    	$nivel->estado=1;
    	$nivel->save();

    	 return redirect('seccion')->with('mensaje','nivel academico creado correctamente');
    }
    public function desactivarNivel($id){
        $nivel=Nivel::findOrFail($id);
        if($nivel->estado == 0){
            $nivel->estado=1;
            $nivel->save();
            return redirect('seccion')->with('mensaje','nivel academico activada correctamente');
        }elseif($nivel->estado == 1){
            $nivel->estado=0;
            $nivel->save();
            return redirect('seccion')->with('mensaje','nivel academico suspendido correctamente'); 
        }
            
    }   

    public function edit(request $request,$id){
    	$nivel=Nivel::findOrFail($id);
    	$nivel->nameNivel=$request->nombre;
    	$nivel->save();
    	return redirect('seccion')->with('mensaje','nivel academico creado correctamente');

    }

    public function delete($id){
    	$borrar=Nivel::findOrFail($id);
    	$borrar->delete();
    	    	return redirect('seccion')->with('mensaje','nivel academico eliminado  correctamente');
		
    }
}
