<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\User;
use App\Nivel;
use App\Seccione;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $bachillerT= Nivel::create([
            'nameNivel'=>'Tecnico Comercial',
            'estado'=>'1',
           
        ]);

         $bachillerG= Nivel::create([
            'nameNivel'=>'Bachillerato General',
            'estado'=>'1',
         
        ]);


        $a=Seccione::create([
            'seccion'=>'a',
            'estado'=>'1'
        ]); 

        $b=Seccione::create([
            'seccion'=>'b',
            'estado'=>'1'
        ]); 



        app()['cache']->forget('spatie.permission.cache');

        //////////////permisos para libros  
        Permission::create(['name'=>'editarLibro']);
        Permission::create(['name'=>'agregarLibro']);
        Permission::create(['name'=>'eliminarLibro']);
        Permission::create(['name'=>'listarLibro']);
        //////////////permisos para usuarios
        Permission::create(['name'=>'editarUsuario']);
        Permission::create(['name'=>'agregarUsuario']);
        Permission::create(['name'=>'eliminarUsuario']);
        Permission::create(['name'=>'listarUsuario']);
        //////////////permisos para notas
        Permission::create(['name'=>'editarNota']);
        Permission::create(['name'=>'agregarNota']);
        Permission::create(['name'=>'eliminarNota']);
        Permission::create(['name'=>'listarNotas']);

        Permission::create(['name'=>'editarNoticia']);
        Permission::create(['name'=>'agregarNoticia']);
        Permission::create(['name'=>'eliminarNoticia']);
        Permission::create(['name'=>'listarNoticia']);
        Permission::create(['name'=>'avisos']);
        Permission::create(['name'=>'panel']);
        Permission::create(['name'=>'estudiante']);

        $role= Role::create(['name'=>'administrador']);
        $role->givePermissionTo(Permission::all());

        $role= Role::create(['name'=>'estudiante']);
        $role->givePermissionTo('estudiante');

        $role= Role::create(['name'=>'docente']);
        $role->givePermissionTo('panel');
        $role->givePermissionTo('editarNota');
        $role->givePermissionTo('agregarNota');
        $role->givePermissionTo('eliminarNota');
        $role->givePermissionTo('listarNotas');
        $role->givePermissionTo('editarLibro');
        $role->givePermissionTo('avisos');
        $role->givePermissionTo('eliminarLibro');
        $role->givePermissionTo('listarLibro');
        $role->givePermissionTo('agregarLibro');
        $role->givePermissionTo('editarNoticia');
        $role->givePermissionTo('agregarNoticia');
        $role->givePermissionTo('eliminarNoticia');
        $role->givePermissionTo('listarNoticia');

        $role= Role::create(['name'=>'colaborador']);
        $role->givePermissionTo('panel');
        $role->givePermissionTo('avisos');
        $role->givePermissionTo('editarLibro');       
        $role->givePermissionTo('eliminarLibro');
        $role->givePermissionTo('listarLibro');
        $role->givePermissionTo('agregarLibro');
        $role->givePermissionTo('editarNoticia');
        $role->givePermissionTo('agregarNoticia');
        $role->givePermissionTo('eliminarNoticia');
        $role->givePermissionTo('listarNoticia');
    
         $user = User::create([
            'name' => 'Administrador',
            'apellidos'=>'Incoa',
            'sexo'=>'masculino',
            'nivel_id'=>'1',
            'email' => 'incoaweb@gmail.com',
            'edad'=>'20',
            
            'password' => Hash::make(2020),
            'pass' =>'2020',
             
            
        ]);

        $user->assignRole('administrador');

            $estudiante = User::create([
            'name' => 'Administrador',
            'apellidos'=>'Incoa',
            'sexo'=>'masculino',
            'nie'=>'2345896',
            'nivel_id'=>'1',
            'seccion'=>'a',
            'email' => 'estudiante@gmail.com',
            'edad'=>'20',
            
            'password' => Hash::make(2020),
            'pass' =>'2020',
             
            
        ]);

            $estudiante->assignRole('estudiante');


        $estudiante2 = User::create([
            'name' => 'Administrador',
            'apellidos'=>'Incoa',
            'sexo'=>'masculino',
            'nie'=>'8945563',
            'nivel_id'=>'1',
            'seccion'=>'b',
            'email' => 'estudiante2@gmail.com',
            'edad'=>'20',
         
            'password' => Hash::make(2020),
            'pass' =>'2020',
             
            
        ]);

            $estudiante2->assignRole('estudiante');


        $estudiante3 = User::create([
            'name' => 'Administrador',
            'apellidos'=>'Incoa',
            'sexo'=>'masculino',
            'nie'=>'4551515',
            'nivel_id'=>'1',
            'seccion'=>'a',
            'email' => 'estudiante3@gmail.com',
            'edad'=>'20',
            
            'password' => Hash::make(2020),
            'pass' =>'2020',
             
            
        ]);

            $estudiante3->assignRole('estudiante');        

        
 
    }


}
