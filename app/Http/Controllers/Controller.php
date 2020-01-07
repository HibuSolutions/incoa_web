<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Reporte;
use App\Nivel;
use App\Aviso;
use App\Seccione;
use App\Noticia;
use App\Historial;
use App\Ciclo;
use App\Comentario;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function imprimir($id){

    	$datos=Historial::findOrFail($id);
    	$id=$datos->user_id;
    	$comentarios=DB::table('comentarios')->where('user_id',$id)->get();
        $gg=strlen($datos);
        if($gg == 381){
             return redirect('historial')->with('Error','Estos datos estan vacios datos erroneos por favor borrar estos datos "recordar terminar ciclos solo con notas agregadas esto ocurre cuando terminamos ciclos vacios');
        }
      
    	$pdf = \PDF::loadView('reportes.boleta',compact('datos','comentarios'));
    	return $pdf->download('primer.pdf');
    }


 

      public function estudianteNotas(request $request){

      		$this->validate($request,[
          
            'codigo' => ['min:6','max:6','required',],
    

            

        ],

        [
            'codigo.required' => 'por favor ingresa el nie',
            'codigo.max' => 'Máximo 6 caracteres para el codigo',
            'codigo.min' => 'Minimo 6 caracteres para el codigo',
           

          

        ]);


            $codigo=$request->codigo;
            $user=DB::table('users')->where('codigo',$codigo)->first();
             if($user === null){
            	return redirect('login')->with('mensaje','no encontramos ningun estudiante con  ese codigo lo sentimos ');     
            }
            $key=$user->id;
            $comentarios=DB::table('comentarios')->where('user_id',$key)->get();
            $datos=DB::table('ciclos')->where('user_id',$key)->first();
          	if($datos === null){
            	return redirect('login')->with('mensaje','el estudiante no tiene ciclo asignado  ');     
            } 
           
            return view('estudiante',compact('datos','user','comentarios'));



        }
   

        public function delete(){
            $borra=User::findOrFail(auth()->user()->id);
            $borra->delete();

            $ciclo=DB::table('ciclos')->where('user_id',auth()->user()->id)->delete();
            

            return redirect('login')->with('adios','Gracias por formar parte de nuestra comunidad esperamos regreses');     
        }

   
}
