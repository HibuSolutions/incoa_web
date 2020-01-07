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
    @hasrole('administrador')
  <a class="btn-sm btn btn-primary mr-1" href="{{route('crearPerfil')}}"><i class="fas fa-user-plus"></i> Agregar</a>
  @endhasrole
<a class="btn-sm btn btn-success" href=""><i class="far fa-file-excel"></i> Reporte Excel</a>
</div>




              <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Nivel</th>
                    <th>Seccion</th>
                    <th>Rol</th>
                    <th>Vigencia</th>
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
                    <td>{{$user->seccion}}</td>
                    <td >{{$user->roles->implode('name',',')}}</td>
                    <td>
                     @if($user->estatus == 0)
                    <button class="btn-sm btn-success">Vigente</button>
                    @elseif($user->estatus  == 1)
                    <button class="btn-sm btn-danger">Graduado</button>
                    @endif   
                </td>
<td class="btn-group"  scope="rows"> 
@if(Auth::user()->id == $user->id)    
<a class="btn-sm btn btn-warning ml-1" href="{{url('verPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-eye"></i></a>

@hasrole('administrador')
<a class="btn-sm btn btn-info ml-1" href="{{url('editPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-user-edit"></i></a> 
@endhasrole
                            <button type="button" class="btn-sm btn btn-success ml-1" data-toggle="modal" data-target="#exampleModa{{$user->id}}">
                            <i class="far fa-comment-dots"></i>
                            </button>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comentar Sobre Estudiante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('crear',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Comentario</label>

                            <div class="col-md-6">
                            <textarea required  name="comentario" class="form-control" rows="5" cols="20"></textarea>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>

@else
<a class="btn-sm btn btn-warning ml-1" href="{{url('verPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-eye"></i></a>

   <button type="button" class="btn-sm btn btn-success ml-1" data-toggle="modal" data-target="#exampleModa{{$user->id}}">
                            <i class="far fa-comment-dots"></i>
                            </button>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comentar Sobre Estudiante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('crear',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Comentario</label>

                            <div class="col-md-6">
                            <textarea required  name="comentario" class="form-control" rows="5" cols="20"></textarea>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>

                          <a title="Honores" class="btn-sm btn-primary ml-1" href="{{url('honores',Crypt::encrypt($user->id))}}"><i class="fas fa-star text-warning"></i></a>  


@role('administrador')
<a class="btn-sm btn btn-info ml-1" href="{{url('editPerfil',Crypt::encrypt($user->id))}}"><i class="fas fa-user-edit"></i></a> 
@endrole
@hasrole('administrador')


<button type="button" class="btn-sm btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModa{{$user->id}}1">
<i class="far fa-trash-alt"></i>
</button>


<div class="modal fade" id="exampleModa{{$user->id}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar Estudiante <i class="fas fa-user-times"></i></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ url('deletePerfil', $user->id) }}" method="post">
@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
</form>
</div>

</div>

</div>
</div>

@else
   
@endhasrole


@endif


</td>
                   
                  </tr>
                @endforeach
                </tbody>
              </table>
            
@endsection