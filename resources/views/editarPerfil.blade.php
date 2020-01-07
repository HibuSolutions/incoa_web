@extends('plantilla.cliente')

@section('content')
<center>
  <div class="col-md-6 card color text-white">
    <form action="{{route('actualizarPerfil')}}" class="" method="post" enctype="multipart/form-data">
      @csrf
 


              <div class="form-group profile-img">
                         
              @if(Auth::user()->foto == null)
              <img src="img/ui/perfilDefault.png" class="" alt="sube una foto de perfil"/>
              @else
              <img src="../storage/app/{{Auth::user()->foto}}" class="" alt="sube una foto de perfil"/>
              @endif


              <input type="file" class="btn btn-info"  name="foto" class="" id="subirfoto">
              <a href="{{route('deleteMy')}}" class="btn btn-danger btn-sm mt-3">Eliminar Cuenta</a>
              </div>  


              <div class="form-group  ">
              <label>Nombres</label>
              <input type="text" class="form-control" name="nombre" value="{{Auth::user()->name}}">               
              </div> 
              <div class="form-group  ">
              <label>Apellidos</label>
              <input type="text" class="form-control" name="apellido" value="{{Auth::user()->apellidos}}">               
              </div>
              <div class="form-group  ">
              <label>Codigo Personal </label>
              <input type="text" class="form-control" name="codigo" value="{{Auth::user()->codigo}}">               
              </div>
               <div class="form-group  ">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">               
              </div>
              <div class="form-group  ">
              <label>Edad</label>
              <input type="number" class="form-control" name="edad" value="{{Auth::user()->edad}}">               
              </div> 
               <div class="form-group  ">
              <label>Nie</label>
              <input type="text" class="form-control" name="nie" value="{{Auth::user()->nie}}">               
              </div>
              <div class="form-group  ">
              <label>Clave</label>
              <input type="text" class="form-control" name="pass" value="{{Auth::user()->pass}}">               
              </div>
              <div class="form-group  ">
              <label>Tel</label>
              <input type="text" class="form-control" name="tel" value="{{Auth::user()->tel}}">               
              </div>
               <div class="form-group  ">
              <label>Tel Responsable</label>
              <input type="text" class="form-control" name="telResponsable" value="{{Auth::user()->tel_Responsable}}">               
              </div>

                <div class="form-group  ">
              <label>Direccion</label>
              <textarea class="form-control" name="direccion" >{{Auth::user()->direccion}}</textarea>                 
              </div>

              <div class="form-group  ">
              <label>Salud</label>
              <textarea class="form-control" name="salud">{{Auth::user()->datos_salud}}</textarea>              
              </div>


              <button type="submit" class="btn btn-primary"><i class="fas fa-sync"></i> Actualizar</button>
              <a class="btn btn-danger" href="{{route('miperfil')}}">Regresar</a>

  </form>
  </div>

</center>


@endsection
