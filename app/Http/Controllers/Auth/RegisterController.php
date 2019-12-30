<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use HasRoles;

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'apellidos' => ['required', 'string', 'max:30'],
            'dui'=>['required', 'min:9','max:9'],
            'sexo'=>['required'],
            'nivel'=>['required'],
            'edad'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

       ],

       [
            'name.max' => 'Máximo 30 caracteres para el nombre',
            'dui.max' => 'Máximo 9 caracteres para el dui',
            'dui.min' => 'Minimo 9 caracteres para el dui',
            'apellidos.max' => 'Máximo 30 caracteres para el apellido',
            'email.unique'=>'este email ya esta en uso',


            'sexo.required'=>'por favor seleciona tu sexo',
            'nivel.required'=>'por favor seleciona tu nivel educativo',
            'edad.required'=>'ingresa tu edad por favor',

        ]);
    }

    /**
     dd($data);

        

     */
    protected function create(array $array)
    {   
        
        $user = User::create([
            'name' => $array['name'],
            'apellidos'=>$array['apellidos'],
            'sexo'=>$array['sexo'],
            'nivel_id'=>$array['nivel'],
            'email' => $array['email'],
            'edad'=>$array['edad'],
            'dui_tutor'=>$array['dui'],
            'password' => Hash::make($array['password']),
            'pass' =>$array['password'],
             
            
        ]);

            $user->assignRole('estudiante');

            return $user;
 
           
    }



}
