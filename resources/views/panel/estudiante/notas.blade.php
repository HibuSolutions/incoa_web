@extends('plantilla.panel')


@section('container')
<h6>Notas</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
@foreach($notas as $nota)    
<div class="col-md-6">
 <form action="{{url('editarC',$nota->id)}}" method="post">
  @csrf
  <div class="form-group">
    <label>Matematica</label>
    <input class="form-control" type="number"  step="any" name="matematica" value="{{$nota->matematica}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Lenguaje</label>
    <input class="form-control" type="number" step="any" name="lenguaje" value="{{$nota->lenguaje}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Sociales</label>
    <input class="form-control" type="number" step="any" name="sociales" value="{{$nota->sociales}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Ciencias</label>
    <input class="form-control" type="number" step="any" name="ciencias" value="{{$nota->ciencias}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Ingles</label>
    <input class="form-control" type="number" step="any" name="ingles" value="{{$nota->ingles}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Informatica</label>
    <input class="form-control" type="number" step="any" name="informatica" value="{{$nota->informatica}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Opv</label>
    <input class="form-control" type="number" step="any" name="opv" value="{{$nota->opv}}" min="0" max="10">
  </div>
   <div class="form-group">
    <label>Seminario</label>
    <input class="form-control" type="number"  step="any" name="seminario" value="{{$nota->seminario}}" min="0" max="10">
  </div>
  <div class="form-group">
    <label>Tecnologia Comercial</label>
    <input class="form-control" type="number" step="any" name="tecnologia" value="{{$nota->tecnologia_comercial}}" min="0" max="10">
  </div>
  <div class="form-group">
    <label>Creatividad</label>
    <input class="form-control" type="number" step="any" name="creatividad" value="{{$nota->creatividad}}" min="0" max="10">
  </div>
    <div class="form-group">
    <label>fisica</label>
    <input class="form-control" type="number" step="any" name="fisica" value="{{$nota->fisica}}" min="0" max="10">
  </div>

  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a class="btn btn-danger" href="{{route('estudiantes')}}">Regresar</a>
</form> 
</div>
@endforeach
@endsection