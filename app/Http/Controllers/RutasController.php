<?php

namespace App\Http\Controllers;
use App\User;
use App\Reporte;
use App\Nivel;
use App\Aviso;
use App\Noticia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RutasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
    $noticias=Noticia::paginate(8);
    	return view('inicio',compact('noticias'));
    }

    public function verNoticia($id){
    $id =  Crypt::decrypt($id);    
    $noticia=Noticia::where('noticias.id',$id)
    ->paginate(8);

        return view('noticia',compact('noticia'));
    }

    public function miPerfil(){
        $avisos=Aviso::all();
        


        $usuario=User::all()->where('id',auth()->user()->id);

        
        return view('miperfil',compact('avisos','usuario'));
    }

    

    public function editarPerfil(){

        return view('editarPerfil');
    }

    public function actualizarPerfil(request $request){

        $id=auth()->user()->id;
        $usuario=User::findOrFail($id);

        if($request->hasFile('foto')){
        Storage::disk('local')->delete('app',$usuario->foto);
        $rutaImagen=$request->file('foto')->store('perfil');
        
        $registro=User::findOrFail($id);
        $registro->name=$request->nombre;
        $registro->apellidos=$request->apellido;
        $registro->dui_tutor=$request->dui;
        $registro->nie=$request->nie;
        $registro->foto=$rutaImagen;
        $registro->edad=$request->edad;
        $registro->tel=$request->tel;
        $registro->tel_Responsable=$request->telResponsable;
        $registro->direccion=$request->direccion;
        $registro->datos_salud=$request->salud;
        $registro->email=$request->email;
        $registro->password=bcrypt($request->pass);
        $registro->pass=$request->pass;
        $registro->save();
                
        }else{
        $registro=User::findOrFail($id);
        $registro->name=$request->nombre;
        $registro->apellidos=$request->apellido;
        $registro->dui_tutor=$request->dui;
        $registro->nie=$request->nie;
        $registro->tel_Responsable=$request->telResponsable;
        $registro->edad=$request->edad;
        $registro->tel=$request->tel;
        $registro->direccion=$request->direccion;
        $registro->datos_salud=$request->salud;
        $registro->email=$request->email;
        $registro->password=bcrypt($request->pass);
        $registro->pass=$request->pass;
        $registro->save();
       
        }
        
         return redirect('miperfil')->with('mensaje','actualizastes tus datos correctamente');      
        
    }



    public function verNotas(){

    }




/////////////////////admin////////////////////////////

    public function panel(){


    $noticiasTotal=Noticia::all()->count();
    $usuariosTotal = DB::table('model_has_roles')->where('role_id', 2)->count();
    $avisosTotal=Aviso::all()->count();
    $reportesTotal=Reporte::all()->count();
    $reportes=Reporte::OrderBy('id','desc')->take(5)->get();
	return view('panel.index',compact('usuariosTotal','reportes','noticiasTotal','avisosTotal','reportesTotal'));
    }



    public function usuariosPanel(){
    $usuarios=User::join('nivels','users.nivel_id','=','nivels.id')
    ->select('users.id','users.name','users.pass','users.email','users.tel','users.dui_tutor','users.direccion','users.foto','users.apellidos','users.nie','users.edad','users.datos_salud','users.created_at','nivels.nameNivel')
    ->get();
     return view('panel.usuario.index',compact('usuarios'));
    }




    public function verPerfil($id){
        $id =  Crypt::decrypt($id);
        $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
        ->where('users.id','=',$id)
        ->get();
        $roles = Role::all()->pluck('name', 'id');
        return view('panel.usuario.ver',compact('usuario','roles'));
    }




    public function editPerfil($id){
        $id =  Crypt::decrypt($id);
        $nivel=Nivel::all();
         $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
        ->where('users.id','=',$id)->select('users.name','users.pass','users.email','users.tel','users.dui_tutor','users.direccion','users.foto','users.apellidos','users.nie','users.edad','users.sexo','users.datos_salud','users.created_at','nivels.nameNivel','nivels.id','users.responsable','users.excelencia','users.estudioso','users.puntual','users.colaborador','users.deportista',)->get();
        
               
        $roles = Role::all()->pluck('name', 'id');
        $usu=User::findOrFail($id);
        return view ('panel.usuario.edit',compact('usuario','nivel','usu','roles'));
    }

    public function updatedPerfil(request $request ,$id){
         $id =  Crypt::decrypt($id);
         

        if($request->hasFile('foto')){
            $usuario=User::findOrFail($id);
            Storage::disk('local')->delete('app',$usuario->foto);
            $rutaImagen=$request->file('foto')->store('perfil');
            $registro=User::findOrFail($id);
            $registro->name=$request->nombre;
            $registro->email=$request->email;
            $registro->apellidos=$request->apellidos;
            $registro->nivel_id=$request->nivel;
            $registro->edad=$request->edad;
            $registro->nivel_id=$request->nivel;
            $registro->sexo=$request->sexo;
            $registro->nie=$request->nie;
            $registro->datos_salud=$request->salud;
            $registro->dui_tutor=$request->dui;
            $registro->tel=$request->tel;
            $registro->tel_Responsable=$request->telResponsable;
            $registro->datos_salud=$request->salud;
            $registro->direccion=$request->direccion;
            $registro->foto=$rutaImagen;
            $registro->password=bcrypt($request->pass);
            $registro->pass=$request->pass;
            $registro->responsable=$request->responsable;
            $registro->excelencia=$request->excelencia;
            $registro->estudioso=$request->estudioso;
            $registro->puntual=$request->puntual;
            $registro->colaborador=$request->colaborador;
            $registro->deportista=$request->deportista;
            if($registro->save()){
                $registro->syncRoles([$request->rol]);
            }
            return redirect('usuarios')->with('mensaje','usuario actualizado correctamente');
          
        }else{
            $registro=User::findOrFail($id);
            $registro->name=$request->nombre;
            $registro->email=$request->email;
            $registro->apellidos=$request->apellidos;
            $registro->nivel_id=$request->nivel;
            $registro->edad=$request->edad;
            $registro->nivel_id=$request->nivel;
            $registro->sexo=$request->sexo;
            $registro->datos_salud=$request->salud;
            $registro->dui_tutor=$request->dui;
            $registro->nie=$request->nie;
            $registro->tel=$request->tel;
            $registro->tel_Responsable=$request->telResponsable;
            $registro->datos_salud=$request->salud;
            $registro->direccion=$request->direccion;
            $registro->password=bcrypt($request->pass);
            $registro->responsable=$request->responsable;
            $registro->excelencia=$request->excelencia;
            $registro->estudioso=$request->estudioso;
            $registro->puntual=$request->puntual;
            $registro->colaborador=$request->colaborador;
            $registro->deportista=$request->deportista;
             if($registro->save()){
                $registro->syncRoles([$request->rol]);
            }
            return redirect('usuarios')->with('mensaje','usuario actualizado correctamente');
        }

         

    }


    public function deletePerfil($id){

        $usuario = User::findOrFail($id);
        Storage::disk('local')->delete('app',$usuario->foto); 
        $usuario->delete();
        return redirect('usuarios')->with('mensaje','usuario eliminado correctamente');
        

    }

    public function crearPerfil(){
    $nivel=Nivel::all();
    $roles = Role::all()->pluck('name', 'id');
    return view('panel.usuario.create',compact('nivel','roles'));
    }

    public function agregarUsuario(request $request){

    $registro= new User;
    $registro->name=$request->name;
    $registro->email=$request->email;
    $registro->apellidos=$request->apellidos;
    $registro->nivel_id=$request->nivel;
    $registro->edad=$request->edad;
    $registro->nivel_id=$request->nivel;
    $registro->sexo=$request->sexo;
    $registro->dui_tutor=$request->dui;
    $registro->password=Hash::make($request->password);
    $registro->pass=$request->password;
     if($registro->save()){
                $registro->syncRoles([$request->rol]);
    }
    return redirect('usuarios')->with('mensaje','usuario agregado correctamente');
    }



}
