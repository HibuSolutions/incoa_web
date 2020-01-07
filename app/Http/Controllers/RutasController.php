<?php

namespace App\Http\Controllers;
use App\User;
use App\Reporte;
use App\Nivel;
use App\Aviso;
use App\Seccione;
use App\Noticia;
use App\Historial;
use App\Ciclo;
use App\Comentario;
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
    


    $noticia=Noticia::join('users','noticias.user_id','=','users.id')
    ->where('noticias.id','=',$id)
    ->select('noticias.foto','noticias.noticia','noticias.titulo','users.name')->get();
    

    return view('noticia',compact('noticia'));
    }

    public function miPerfil(){
    $avisos=Aviso::all();
    
    
     $nivel=User::join('nivels','users.nivel_id','=','nivels.id')
    ->where('users.id','=',auth()->user()->id)
    ->first(); 

     $usuario=User::all()->where('id',auth()->user()->id);

    

    return view('miperfil',compact('avisos','usuario','nivel'));
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
    $registro->codigo=$request->codigo;
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
    $registro->codigo=$request->codigo;
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

    ////////////////////////getios de notas

    public function verNotas(){
    $notas=DB::table('ciclos')->where('user_id', auth()->user()->id)->get();

    $comentarios=DB::table('comentarios')->where('user_id', auth()->user()->id)->get();

    return view('notas',compact('notas','comentarios'));

    }

/////////////////////****************Panel Administrativo****************///////////////////////////////////////////////




    public function panel(){
    $noticiasTotal=Noticia::all()->count();
    $usuariosTotal = DB::table('users')->where('nie', '!=', null )->count();
    $avisosTotal=Aviso::all()->count();
    $reportesTotal=Reporte::all()->count();
    $reportes=Reporte::OrderBy('id','desc')->take(5)->get();
	return view('panel.index',compact('usuariosTotal','reportes','noticiasTotal','avisosTotal','reportesTotal'));
    }

/////////////////////****************Panel Administrativo Usuarios****//////////////////////////////////////////////
    public function usuariosPanel(){
    $usuarios=User::join('nivels','users.nivel_id','=','nivels.id')
    ->select('users.id','users.name','users.pass','users.email',
        'users.tel','users.codigo','users.direccion','users.foto',
        'users.apellidos','users.nie','users.edad','users.datos_salud',
        'users.created_at','nivels.nameNivel','users.seccion','users.estatus','users.codigo','users.pass')
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
    $secciones=Seccione::all()->where('estado',1);
    $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
    ->where('users.id','=',$id)->first();

    $roles = Role::all()->pluck('name', 'id');
    $usu=User::findOrFail($id);
    return view ('panel.usuario.edit',compact('usuario','nivel','usu','roles','secciones'));
    }

    public function updatedPerfil(request $request ,$id){
    $id =  Crypt::decrypt($id);

            $this->validate($request,[
            'nombre' => ['required', 'string','max:20'],
            'apellidos'=> ['required', 'string','max:20'],
            'edad'=> ['required'],
            'codigo' => ['min:6','max:6'],
            'email'=>['required'],
           
            'nie'=>['min:8','max:8'],
            'pass'=>['required'],

            

        ],

        [
            'nie.required' => 'por favor ingresa el nie',
            'codigo.max' => 'Máximo 6 caracteres para el codigo',
            'codigo.min' => 'Minimo 6caracteres para el codigo',
            'nie.max' => 'Máximo 8  caracteres para el nie',
            'nie.min' => 'Minimo 8 caracteres para el nie',
            'email'=>'por favor ingresa el email',

          

        ]);
 


    if($request->hasFile('foto')){
    $usuario=User::findOrFail($id);
    Storage::disk('local')->delete('app',$usuario->foto);
    $rutaImagen=$request->file('foto')->store('perfil');
    $registro=User::findOrFail($id);
    $registro->name=$request->nombre;
    $registro->seccion=$request->seccion;
    $registro->email=$request->email;
    $registro->apellidos=$request->apellidos;
    $registro->nivel_id=$request->nivel;
    $registro->edad=$request->edad;
    $registro->nivel_id=$request->nivel;
    $registro->sexo=$request->sexo;
    $registro->nie=$request->nie;
    $registro->datos_salud=$request->salud;
    $registro->codigo=$request->codigo;
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
    $registro->seccion=$request->seccion;
    $registro->apellidos=$request->apellidos;
    $registro->nivel_id=$request->nivel;
    $registro->edad=$request->edad;
    $registro->nivel_id=$request->nivel;
    $registro->sexo=$request->sexo;
    $registro->datos_salud=$request->salud;
    $registro->codigo=$request->codigo;
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
    $nivel=Nivel::all()->where('estado',1);
    $roles = Role::all()->pluck('name', 'id');
    $secciones=Seccione::all()->where('estado',1);


    return view('panel.usuario.create',compact('nivel','roles','secciones'));
    }

    public function agregarUsuario(request $request){

          $this->validate($request,[
            'name' => ['required', 'string', 'max:20'],
            'apellidos' => ['required', 'string', 'max:20'],
            
            'sexo'=>['required'],
            'nivel'=>['required'],
            'seccion'=>['required'],
            'edad'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ],

        [
            'name.max' => 'Máximo 20 caracteres para el nombre',
           
            
            'apellidos.max' => 'Máximo 20 caracteres para el apellido',
            'email.unique'=>'este email ya esta en uso',
            'seccion.required'=>'por favor seleciona tu seccion',
            'sexo.required'=>'por favor seleciona tu sexo',
            'nivel.required'=>'por favor seleciona tu nivel educativo',
            'edad.required'=>'ingrese su edad por favor',

        ]);


    $registro= new User;
    $registro->name=$request->name;
    $registro->email=$request->email;
    $registro->apellidos=$request->apellidos;
    $registro->nivel_id=$request->nivel;
    $registro->edad=$request->edad;
    $registro->nivel_id=$request->nivel;
    $registro->sexo=$request->sexo;
    
    $registro->password=Hash::make($request->password);
    $registro->pass=$request->password;
    if($registro->save()){
    $registro->syncRoles([$request->rol]);
    }
    return redirect('usuarios')->with('mensaje','usuario agregado correctamente');
    }
/////////////////////****************Panel Administrativo Estudiantes y Ciclos************//////////////////////////////

    public function estudiantes(){
    $estudiantes=User::join('nivels','users.nivel_id','=','nivels.id')->where('nie','!=', null)->where('estatus','0')
    ->select('users.id','users.name','users.pass','users.email','users.tel','users.codigo',
    'users.direccion','users.foto','users.apellidos','users.nie','users.edad',
    'users.datos_salud','users.created_at','nivels.nameNivel','users.ciclo','users.seccion')
    ->get();

    return view('panel.estudiante.index',compact('estudiantes'));
    }


    public function aggNota($id){

    $notas=DB::table('ciclos')->where('user_id', $id)->get();
    return view('panel.estudiante.notas',compact('notas'));
    }

    public function activarCiclo($id){

    $ciclo=User::findOrFail($id);
    $nombre=$ciclo->name;
    if($ciclo->ciclo == 0){
    $ciclo->ciclo=1;
    }
    $ciclo->save();

    $nciclo=new Ciclo;
    $nciclo->user_id=$id;
    $nciclo->estado=1;
    $nciclo->seccion=$ciclo->seccion;
    $nciclo->save();

    return redirect('estudiantes')->with('mensaje','El ciclo del estudiante se activo correctamente');

    }

    public function editarCiclo(request $request,$id){
    $ciclo=Ciclo::findOrFail($id);
    $ciclo->lenguaje=$request->lenguaje;
    $ciclo->matematica=$request->matematica;
    $ciclo->ciencias=$request->ciencias;
    $ciclo->sociales=$request->sociales;
    $ciclo->ingles=$request->ingles;
    $ciclo->fisica=$request->fisica;
    $ciclo->opv=$request->opv;
    $ciclo->seminario=$request->seminario;
    $ciclo->tecnologia_comercial=$request->tecnologia;
    $ciclo->informatica=$request->informatica;
    $ciclo->creatividad=$request->creatividad;
    $ciclo->save();
    return redirect('estudiantes')->with('mensaje','notas actualizadas correctamente');
    }


    public function cicloTerminado($id){

    $usuarior=User::findOrFail($id);
    $usuarior->ciclo=0;
    $usuarior->save();

    $ciclo=DB::table('ciclos')->where('user_id', $id)->first();

    $usuario=User::join('nivels','users.nivel_id','=','nivels.id')
    ->where('users.id','=',$id)->select('users.id','users.name','users.pass','users.email','users.tel','users.codigo','users.direccion','users.foto','users.apellidos','users.nie','users.edad','users.datos_salud','users.created_at','nivels.nameNivel','users.ciclo','users.seccion')
    ->first();



    $historial= new Historial;
    $historial->seccion=$usuario->seccion;
    $historial->nombre=$usuario->name;
    $historial->apellido=$usuario->apellidos;
    $historial->nie=$usuario->nie;
    
    $historial->nivel=$usuario->nameNivel;
    $historial->user_id=$usuario->id;
    $historial->seccion=$usuario->seccion;
    $historial->lenguaje=$ciclo->lenguaje;
    $historial->matematica=$ciclo->matematica;
    $historial->ciencias=$ciclo->ciencias;
    $historial->sociales=$ciclo->sociales;
    $historial->ingles=$ciclo->ingles;
    $historial->fisica=$ciclo->fisica;
    $historial->opv=$ciclo->opv;
    $historial->seminario=$ciclo->seminario;
    $historial->tecnologia_comercial=$ciclo->tecnologia_comercial;
    $historial->informatica=$ciclo->informatica;
    $historial->creatividad=$ciclo->creatividad;
    $historial->save();

    $ciclo=DB::table('ciclos')->where('user_id', $id)->delete();

    return redirect('estudiantes')->with('mensaje','ciclo terminado correctamente');
    }

////////////////////Panel Administrativo Secciones y Niveles Academicos////////////////////////////////////////////////
        public function seccion(){

        $niveles=Nivel::all();
        $secciones=Seccione::all();
        return view('panel.seccion.index',compact('niveles','secciones'));
        }

        public function crearSeccion(request $request){

        $seccion=new Seccione;
        $seccion->seccion=$request->seccion;
        $seccion->estado=1;
        $seccion->save();
        return redirect('seccion')->with('mensaje','seccion agregada correctamente');
        }

        public function desactivarSeccion($id){
        $estado=Seccione::findOrFail($id);
        if($estado->estado == 0){
        $estado->estado=1;
        $estado->save();
        return redirect('seccion')->with('mensaje','seccion activada correctamente');
        }elseif($estado->estado == 1){
        $estado->estado=0;
        $estado->save();
        return redirect('seccion')->with('mensaje','seccion suspendida correctamente'); 
        }

        }   



        public function eliminarSeccion($id){
        $borrar=Seccione::findOrFail($id);
        $borrar->delete();
        return redirect('seccion')->with('mensaje','seccion eliminada  correctamente');
        }
////////////////////////////////culiminar//////////////////////////////////    

        public function culminar ($id){

            $culminar=User::findOrFail($id);
            $culminar->estatus=1;
            $culminar->save();
      return redirect('estudiantes')->with('mensaje','El estudiante culmino sus estudios correctamente');

        }

        public function eliminarHistorial($id){

            $delete=Historial::findOrFail($id);
            $delete->delete();
            return redirect('historial')->with('mensaje','se elimino historial correctamente');

        }


        public function honores($id){
            $id =  Crypt::decrypt($id);
            $usuario=User::findOrFail($id);

            return view('panel.usuario.honores',compact('usuario'));
        }

        public function honoresControl(request $request,$id){
            $id =  Crypt::decrypt($id);
            $registro=User::findOrFail($id);
            $registro->responsable=$request->responsable;
            $registro->excelencia=$request->excelencia;
            $registro->estudioso=$request->estudioso;
            $registro->puntual=$request->puntual;
            $registro->colaborador=$request->colaborador;
            $registro->deportista=$request->deportista;
            $registro->save();
             return redirect('usuarios')->with('mensaje','honores actualizados correctamente');
        }


        


      
}
