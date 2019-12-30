@extends('plantilla.panel')


@section('container')
<h5>Usuarios <small class="text-success"><i class="fas fa-check-circle"></i> -> usuario logeado</small></h5>
    @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<div class="row ml-1 mb-1">
  <a class="btn-sm btn btn-primary mr-1" href="{{route('crearPerfil')}}"><i class="fas fa-user-plus"></i> Agregar</a>
<a class="btn-sm btn btn-success" href=""><i class="far fa-file-excel"></i> Reporte Excel</a>
</div>




              <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Nivel</th>
             
                    <th>Rol</th>
                    <th>Aciones</th>
                
                  </tr>
                </thead>
         
                <tbody>
                  @foreach($usuarios as $user)
                  <tr>

                    <td>
                       @if(Auth::user()->id == $user->id)
                    <small class="text-success"><i class="fas fa-check-circle"></i></small>
                    @endif
                      {{$user->name}}</td>
                    <td>{{$user->apellidos}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nameNivel}}</td>
                    <td >{{$user->roles->implode('name',',')}}</td>
<td class="btn-group"  scope="rows"> 
@if(Auth::user()->id == $user->id)    
<a class="btn-sm btn btn-warning ml-1" href="{{url('verPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-eye"></i></a>


<a class="btn-sm btn btn-info ml-1" href="{{url('editPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-user-edit"></i></a> 

@else
<a class="btn-sm btn btn-warning ml-1" href="{{url('verPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-eye"></i></a>


<a class="btn-sm btn btn-info ml-1" href="{{url('editPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-user-edit"></i></a> 
<form action="{{ url('deletePerfil', $user->id) }}" method="post">
@csrf()
@method('DELETE')

<button class="btn-sm btn btn-danger ml-1"  ><i class="fas fa-trash"></i></button>
@endif
</form>

</td>
                   
                  </tr>
                @endforeach
                </tbody>
              </table>
            
@endsection