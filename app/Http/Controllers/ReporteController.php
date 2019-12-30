<?php

namespace App\Http\Controllers;
use App\Reporte;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReporteController extends Controller
{

	public function index(){
    	
   $reportes=Reporte::join('users','reportes.user_id','=','users.id')
    ->select('reportes.id','users.name','users.pass','users.email','users.tel','users.dui_tutor','users.direccion','users.foto','users.apellidos','users.nie','users.edad','users.datos_salud','reportes.reporte','reportes.created_at','reportes.user_id')
    ->get(); 	
    return view('panel.reporte.index',compact('reportes'));
    }

    public function nuevoReporte(request $request){

    	$reporte= new Reporte;
    	$reporte->user_id=auth()->user()->id;
    	$reporte->reporte=$request->reporte;
    	$reporte->save();

    	return redirect('miperfil')->with('mensaje','reporte notificado  correctamente');;

    }


    public function ver($id){
    	 $id =  Crypt::decrypt($id);
        $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
        ->where('users.id','=',$id)
        ->get();
     $roles = Role::all()->pluck('name', 'id');
        return view('panel.reporte.ver',compact('usuario','roles'));
    }


    public function eliminar($id){
    	$reporte=Reporte::findOrFail($id);
    	$reporte->delete();
    	return redirect('reporte')->with('mensaje','reporte eliminado  correctamente');

    }
}
