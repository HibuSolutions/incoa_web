@extends('plantilla.panel')


@section('container')
<h6>Comentarios</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif

 <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                   <th>Comentario</th>
                    <th>Autor</th>
                    <th>Nombre.Estudiante</th>  
                    <th>Nie.Estudiante</th>  
          			<th>Aciones</th>
                
                  </tr>
                </thead>
         
                <tbody>
                  @foreach($comentarios as $comentario)
                <tr>
                <td style="max-width: 300px;">{{$comentario->comentario}}</td>  
                <td>{{$comentario->autor}}</td> 
                <td>{{$comentario->name}} {{$comentario->apellidos}}</td>
                <td>
                  @if($comentario->nie == null)
                  <small class="text-danger">no agregado por estudiante</small>
                  @else
                  {{$comentario->nie}}
                  @endif
                  </td>
                   <td>


 


              <button type="button" class="btn-sm btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModa{{$comentario->id}}1">Eliminar
  <i class=" fas fa-check-circle"></i>
  </button>


  <div class="modal fade" id="exampleModa{{$comentario->id}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar Comentario <i class="fas fa-user-times"></i></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form action="{{url('deleteComentario',$comentario->id)}}" method="post">
    @csrf()
    @method('DELETE')


  <button type="submit" class="btn btn-danger btn-sm">confirmar</button>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
  </form>
  </div>

  </div>

  </div>
  </div>
                   </td>
                
     </tr>  
        @endforeach
                </tbody>
              
              </table>
@endsection