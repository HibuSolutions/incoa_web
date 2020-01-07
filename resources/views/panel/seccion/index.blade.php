@extends('plantilla.panel')


@section('container')
<h6>Historial</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<div class="row">
 <div class="col-md-6">
 
   <h6>Secciones </h6>

      <button type="button" class="btn-sm btn btn-primary mt-2 mb-2 " data-toggle="modal" data-target="#exampleModa2">
                            Agregar <i class="fas fa-plus"></i>
                            </button>
                           

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nueva seccion <i class="fas fa-plus"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('crearSeccion')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" name="seccion" required="" placeholder="ingresar el nombre">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Crear</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>

   <ul class="list-group">
    @foreach($secciones as $seccion)
  <li class="list-group-item h6 "><i class="fas fa-angle-right"></i> {{$seccion->seccion}}
    @if($seccion->estado != 0)
   <a class="ml-3 btn  btn-sm btn-warning " href="{{url('supenderS',$seccion->id)}}">Suspender <i class="far fa-times-circle"></i></a> 
   @else
    <a class="ml-3 btn  btn-sm btn-primary  " href="{{url('supenderS',$seccion->id)}}">Activar <i class="fas fa-check-circle"></i></a> 
    @endif

    @role('administrador')
      <a class="btn btn-danger btn-sm" href="{{url('deleteS',$seccion->id)}}"><i class="fas fa-trash"></i></a>
    @endrole
  @endforeach
</ul>
 </div> 
  <div class="col-md-6">
    <small class="text-danger">"Tener muy en claro que los niveles academicos no se puede eliminar solamente editar y crear"</small>
   <h6>Niveles Academicos</h6>
      <button type="button" class="btn-sm btn btn-primary mt-2 mb-2 " data-toggle="modal" data-target="#exampleModa3">
                            Agregar <i class="fas fa-plus"></i>
                            </button>
                           

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nivel academico <i class="fas fa-university"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('crearNivel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" name="nombre" required="" placeholder="ingresar el nombre">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Crear</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>
   <ul class="list-group">
    @foreach($niveles as $nivel)
  <li class="list-group-item h6"><i class="fas fa-angle-right"></i> {{$nivel->nameNivel}}

     @if($nivel->estado != 0)
   <a class="ml-3 btn  btn-sm btn-warning " href="{{url('suspenderNivel',$nivel->id)}}">Suspender <i class="far fa-times-circle"></i></a> 
   @else
    <a class="ml-3 btn  btn-sm btn-primary  " href="{{url('suspenderNivel',$nivel->id)}}">Activar <i class="fas fa-check-circle"></i></a> 
    @endif
   <button type="button" class="btn-sm btn btn-primary mt-2 mb-2 " data-toggle="modal" data-target="#exampleModa4">
                            Editar <i class="far fa-edit"></i>
                            </button>
                           

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar nivel academico <i class="fas fa-university"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('editarNivel',$nivel->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control" name="nombre" required="" placeholder="ingresar el nombre" value="{{$nivel->nameNivel}}">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Crear</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>
 


    
  @endforeach

</ul>
 </div> 
</div>    
@endsection