@extends('plantilla.panel')


@section('container')
@foreach($usuario as $usuario)
<div class="card ">
  <form action="{{url('updatedPerfil',Crypt::encrypt($usu->id))}}" class="" method="post" enctype="multipart/form-data">
  @csrf
       <div class="form-group profile-img">
                         
              @if($usuario->foto == null)
              <img src="../img/ui/perfilDefault.png" class="" alt="sube una foto de perfil"/>
              @else
              <img src="../../storage/app/{{$usuario->foto}}" class="" alt="sube una foto de perfil"/>
              @endif


              <input type="file" class="btn btn-info"  name="foto" class="" id="subirfoto">
    
              </div> 
                <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control"  name="nombre" value="{{$usuario->name}}" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellidos</label>
      <input type="text" name="apellidos" class="form-control"  value="{{$usuario->apellidos}}" >
    </div>
  </div>
               <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Edad</label>
      <input type="text" class="form-control"  name="edad" value="{{$usuario->edad}}" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Dui Responsable</label>
      <input type="text" name="dui" class="form-control"  value="{{$usuario->dui_tutor}}" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control"  name="email" value="{{$usuario->email}}" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="text" class="form-control"  name="pass" value="{{$usuario->pass}}">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Tel Alumno</label>
      <input type="numeric" class="form-control"  name="tel" value="{{$usuario->tel}}" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Tel Responsable</label>
      <input type="text" class="form-control"  name="telResponsable" value="{{$usuario->tel_Responsable}}">
    </div>
  </div>
    <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputCity">Nie</label>
      <input type="text" class="form-control"  name="nie" value="{{$usuario->nie}}">
    </div>

        <div class="form-group col-md-6">
      <label for="inputState">Rol</label>
            <select class="form-control" name="rol">
            @foreach ($roles as $key => $value)
            @if ($usuario->hasRole($value))
            <option value="{{ $value }}" selected>{{ $value }}</option>
            @else
            <option value="{{ $value }}">{{ $value }}</option>
            @endif
            @endforeach

            </select>
    </div>


  </div>
    <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputState">Nivel Academico <small class="text-danger">" actualmente {{$usuario->nameNivel}} "</small> </label>
      <select  name="nivel" class="form-control">
        <option value="{{$usuario->id}}" >Actual {{$usuario->nameNivel}}</option>
        @foreach($nivel as $nivel)
        <option value="{{$nivel->id}}" >{{$nivel->nameNivel}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="inputState">Sexo actual <small class="text-danger">" actualmente {{$usuario->sexo}} "</small> </label>
      <select  name="sexo" class="form-control">
        <option value="{{$usuario->sexo}}" >Actual {{$usuario->sexo}}</option>
        <option value="femenino" >Femenino</option>
        <option value="masculino" >Masculino</option>
        <option value="indefinido" >Indefinido</option>
      </select>
    </div>


  </div>
  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    
    <textarea class="form-control" name="direccion">{{$usuario->direccion}}</textarea>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Informacion Salud</label>
    <textarea class="form-control" name="salud">{{$usuario->datos_salud}}</textarea>
  </div>





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

  @endforeach




            
@endsection