@extends('plantilla.panel')


@section('container')
<h1>Nombre : {{$usuario->name}} {{$usuario->apellidos}}</h1>
    <div class="row justify-content-center">
         <form action="{{url('honoresControl',Crypt::encrypt($usuario->id))}}" class="" method="post" enctype="multipart/form-data">
  @csrf
        <ul class="list-group">
  <h3 class="">Honores <i class="text-warning fas fa-medal"></i></h3>
<li class="list-group-item ">
  @if($usuario->responsable == 1) 
<label class="mr-2">Responsable <i class="fas fa-angle-right"></i></label>
<input type="radio" name="responsable" value="1" checked="">Activado
<input type="radio" name="responsable" value="0" >Desactivar
@else
<label class="mr-2">Responsable <i class="fas fa-angle-right"></i></label>
<input type="radio" name="responsable" value="1" >Activar
<input type="radio" name="responsable" value="0" checked="">Desactivado
@endif
</li>
<li class="list-group-item">
  @if($usuario->excelencia == 1) 
<label class="mr-2">Excelencia <i class="fas fa-angle-right"></i></label>
<input type="radio" name="excelencia" value="1" checked="">Activado
<input type="radio" name="excelencia" value="0" >Desactivar
@else
<label class="mr-2">Excelencia <i class="fas fa-angle-right"></i></label>
<input type="radio" name="excelencia" value="1" >Activar
<input type="radio" name="excelencia" value="0" checked="">Desactivado
@endif
</li>
<li class="list-group-item">
@if($usuario->deportista == 1) 
<label class="mr-2">Deportista <i class="fas fa-angle-right"></i></label>
<input type="radio" name="deportista" value="1" checked="">Activado
<input type="radio" name="deportista" value="0" >Desactivar
@else
<label class="mr-2">Deportista <i class="fas fa-angle-right"></i></label>
<input type="radio" name="deportista" value="1" >Activar
<input type="radio" name="deportista" value="0" checked="">Desactivado
@endif 
</li>
<li class="list-group-item">
@if($usuario->estudioso == 1) 
<label class="mr-2">Estudioso <i class="fas fa-angle-right"></i></label>
<input type="radio" name="estudioso" value="1" checked="">Activado
<input type="radio" name="estudioso" value="0" >Desactivar
@else
<label class="mr-2">Estudioso <i class="fas fa-angle-right"></i></label>
<input type="radio" name="estudioso" value="1" >Activar
<input type="radio" name="estudioso" value="0" checked="">Desactivado
@endif  
</li>
<li class="list-group-item">
@if($usuario->colaborador == 1) 
<label class="mr-2">Colaborador <i class="fas fa-angle-right"></i></label>
<input type="radio" name="colaborador" value="1" checked="">Activado
<input type="radio" name="colaborador" value="0" >Desactivar
@else
<label class="mr-2">Colaborador <i class="fas fa-angle-right"></i></label>
<input type="radio" name="colaborador" value="1" >Activar
<input type="radio" name="colaborador" value="0" checked="">Desactivado
@endif    
</li>
<li class="list-group-item">
 @if($usuario->puntual == 1) 
<label class="mr-2">Puntual <i class="fas fa-angle-right"></i></label>
<input type="radio" name="puntual" value="1" checked="">Activado
<input type="radio" name="puntual" value="0" >Desactivar
@else
<label class="mr-2">Puntual <i class="fas fa-angle-right"></i></label>
<input type="radio" name="puntual" value="1" >Activar
<input type="radio" name="puntual" value="0" checked="">Desactivado
@endif   
</li>

</ul>
  <button type="submit" class="btn btn-primary">Actualizar <i class="fas fa-check"></i></button>
  <a class="btn btn-danger" href="{{route('usuarios')}}">Regresar</a>
</form>
    </div>
@endsection