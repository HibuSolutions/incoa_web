@extends('plantilla.panel')


@section('container')
<h3>Avisos Generados</h3>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<div class="row ml-1 mb-2">
<h6 class="badge badge-success  ml-2">NORMAL</h6>
<h6 class="badge badge-primary ml-2">IMPORTATE</h6>
<h6 class="badge badge-danger  ml-2">URGENTE</h6>
</div>

<button type="button" class="btn btn-info mb-2 " data-toggle="modal" data-target="#exampleModa2">
Generar Aviso <i class="fas fa-plus-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Generar Aviso <i class="fas fa-rss-square"></i></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{route('aviso.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group row">
<label for="sobremi" class="col-md-4 col-form-label text-md-right">Compartenos tu aviso</label>

<div class="col-md-6">
<textarea required  name="aviso" class="form-control" rows="6" cols="50"></textarea>
</div>
</div>
<div class="form-group row">
<label for="sobremi" class="col-md-4 col-form-label text-md-right">Privacidad</label>

<div class="col-md-6">
<select name="privacidad" class="form-control" id="exampleFormControlSelect1">
<option value="todos">todos</option>
<option value="estudiante">estudiantes</option>
<option value="docente">docentes</option>
<option value="colaborador">colaboradores</option>
</select>
</div>
<label for="sobremi" class="col-md-4 col-form-label text-md-right">Importancia</label>

<div class="col-md-6 mt-2 mb-2">
<select name="importancia" class="form-control" id="exampleFormControlSelect1">
<option value="1" >normal</option>
<option value="2" >importante</option>
<option value="3" >urgente</option>

</select>
</div>
</div>
<button type="submit" class="btn btn-primary btn-sm">Compartir</button>
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
</form>
</div>

</div>

</div>
</div>



@foreach($avisos as $aviso)
@switch($aviso->importancia)
@case(1)
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Hey!<i class="fas fa-smile-wink"></i></h4>
<p>{{$aviso->aviso}}</p>
<hr>


<form action="{{ route('aviso.destroy', $aviso->id) }}" method="post" onClick="confirm('Seguro quieres eliminarlo?')">
@csrf()
@method('DELETE')

<button class="btn-sm btn btn-danger"  ><i class="fas fa-minus-circle"></i></button>
<small class="h6">Publicado el {{ date('d-M-y', strtotime($aviso->created_at)) }}   Privacidad  -> {{$aviso->privacidad}}</small>
</form>
</div>
@break

@case(2)
<div class="alert alert-primary" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Hey! mira <i class="far fa-hand-point-left"></i></h4>
<p>{{$aviso->aviso}}</p>
<hr>



<form action="{{ route('aviso.destroy', $aviso->id) }}" method="post" onClick="confirm('Seguro quieres eliminarlo?')">
@csrf()
@method('DELETE')

<button class="btn-sm btn btn-danger"  ><i class="fas fa-minus-circle"></i></button>
<small class="h6">Publicado el {{ date('d-M-y', strtotime($aviso->created_at)) }}   Privacidad  -> {{$aviso->privacidad}}</small>
</form>

</div>
@break

@case(3)
<div class="alert alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Hey! esto parece muy importante <i class="fas fa-exclamation-circle"></i></h4>
<p>{{$aviso->aviso}}</p>
<hr>


<form action="{{ route('aviso.destroy', $aviso->id) }}" method="post" onClick="confirm('Seguro quieres eliminarlo?')">
@csrf()
@method('DELETE')

<button class="btn-sm btn btn-danger"  ><i class="fas fa-minus-circle"></i></button>
<small class="h6">Publicado el {{ date('d-M-y', strtotime($aviso->created_at)) }}   Privacidad  -> {{$aviso->privacidad}}</small>
</form>
</div>
@break
@endswitch
@endforeach


@endsection