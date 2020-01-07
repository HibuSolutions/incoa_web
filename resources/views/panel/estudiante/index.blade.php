@extends('plantilla.panel')


@section('container')
<h6>Estudiantes</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<small class="text-danger h6">Recordar que al terminar ciclo se cierra  con las notas actuales </small>
 <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                 
                    <th>Nombre Completo</th>
                    <th>Nie</th>
                     <th>Seccion</th> 
          			     <th>Nivel</th>
                  
                     <th>Acciones</th> 
                  </tr>
                </thead>
         
                <tbody>
               @foreach($estudiantes as $estudiante)  
                <tr>
                  <td>{{$estudiante->name}} {{$estudiante->apellidos}}</td>
                  <td>{{$estudiante->nie}}</td>
                  
                  <td>{{$estudiante->seccion}}</td>
                  <td>{{$estudiante->nameNivel}}</td>
                  <td>
                    
                    @if($estudiante->ciclo == 0 && $estudiante->nie != null)
                    <a   href="{{url('activarC',$estudiante->id)}}" class="btn-sm btn btn-success" title="comenzar ciclo"><i class="far fa-calendar-alt"></i> Comenzar Ciclo</a>

<button type="button" class="btn-sm btn btn-primary ml-1" data-toggle="modal" data-target="#exampleModa{{$estudiante->id}}1">Graduado
<i class="fas fa-user-graduate"></i><i class="fas fa-star text-warning"></i>
</button>


<div class="modal fade" id="exampleModa{{$estudiante->id}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-danger" id="exampleModalLabel">Culminar Estudios?<i class="fas fa-user-times"></i></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{url('culminar',$estudiante->id)}}" method="get">
@csrf


<button type="submit" class="btn btn-danger btn-sm">confirmar</button>
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
</form>
</div>

</div>

</div>
</div>

                    @else


  <a title="Notas del estudiante" href="{{url('aggNota',$estudiante->id)}}" class="btn-sm btn btn-primary"><i class="fas fa-clipboard-list"></i></a>




 <button title="comentario sobre el estudiante" type="button" class="btn-sm btn btn-success ml-1" data-toggle="modal" data-target="#exampleModa{{$estudiante->id}}8">
                            <i class="far fa-comment-dots"></i>
                            </button>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa{{$estudiante->id}}8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comentar Sobre Estudiante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('crear',$estudiante->id)}}" method="post" enctype="multipart/form-data">
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

  <button type="button" class="btn-sm btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModa{{$estudiante->id}}1">Terminar Ciclo
  <i class=" fas fa-check-circle"></i>
  </button>


  <div class="modal fade" id="exampleModa{{$estudiante->id}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title text-danger" id="exampleModalLabel">Terminar Ciclo <i class="fas fa-user-times"></i></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form action="{{url('terminarC',$estudiante->id)}}" method="get">
  @csrf
  <div>
    <small>Recordar por lo menos agregar una nota no se permiten dejar vacio todos los campos por lo
    menos agregar una nota</small>
  </div>

  <button type="submit" class="btn btn-danger btn-sm">confirmar</button>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
  </form>
  </div>

  </div>

  </div>
  </div>



                    @endif
                  </td>
                   
                
     </tr>  
        @endforeach
                </tbody>
              
              </table>
@endsection