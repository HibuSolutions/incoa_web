@extends('plantilla.cliente')

@section('content')
<center>
   <div class="col-md-6">
       @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Perfecto !</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
@foreach($usuario as $usuario)
@foreach($avisos as $aviso)
@if($aviso->privacidad ==  $usuario->roles->implode('name',','))  
@switch($aviso->importancia)
@case(1)
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="fas fa-smile-wink"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break

@case(2)
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="far fa-hand-point-left"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break

@case(3)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="fas fa-exclamation-circle"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break
@endswitch
@elseif($aviso->privacidad ==  'todos')
@switch($aviso->importancia)
@case(1)
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="fas fa-smile-wink"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break

@case(2)
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="fas fa-exclamation"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break

@case(3)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{$aviso->aviso}} <i class="fas fa-exclamation-circle"></i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@break
@endswitch
@endif
@endforeach

   </div>
</center>


<div class="container emp-profile">



          <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          @if(Auth::user()->foto == null)
              <img src="img/ui/perfilDefault.png" class="" alt="sube una foto de perfil"/>
              @else
              <img src="../storage/app/{{Auth::user()->foto}}" class="" alt="sube una foto de perfil"/>
              @endif
                     
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{Auth()->user()->name}}
                                        {{Auth()->user()->apellidos}}
                                    </h5>
                                    <h6>
                                        Estudiante de : <small class="text-success h6">{{$nivel->nameNivel}}</small>  <i class="fas fa-book-reader"></i>
                                    </h6>
                                  
                            <ul class="nav nav-tabs cel" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sobre mi</a>
                                </li>
                              
                            </ul>
                        </div>

                    </div>
                
                </div>

                <div class="row cel">

                    <div class="col-md-4">
                       
                        <div class="profile-work ">
                             <hr>
                            <button type="button" class="btn-sm btn btn-danger  " data-toggle="modal" data-target="#exampleModa2">
                            Reporte  <i class="fas fa-bug"></i>
                            </button>
                            <a href="{{route('verNotas')}}" class="btn-sm btn btn-primary text-white">Notas</a>
                             <a title="editar perfil" href="{{route('editarPerfil')}}" class="btn-sm btn btn-secondary text-white"><i class="fas fa-user-edit"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reportalo todo es anonimo <i class="far fa-angry"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('nuevoReporte')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Cuentanos tu problema</label>

                            <div class="col-md-6">
                            <textarea required  name="reporte" class="form-control" rows="5" cols="20"></textarea>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Reportar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>
                            <hr>
                            <h5 class="text-info" ><i class="fas fa-medal"></i> Honores</h5>
                            @if($usuario->excelencia == 1)
            <h6><i class="far fa-check-circle"></i>Excelencia</h6>
            @endif
            @if($usuario->responsable == 1)
            <h6><i class="far fa-check-circle"></i> Responsable</h6>
            @endif
            @if($usuario->puntual == 1)
            <h6><i class="far fa-check-circle"></i> Puntual</h6>
            @endif
            @if($usuario->estudioso == 1)
            <h6><i class="far fa-check-circle"></i> Estudioso</h6>
            @endif
            @if($usuario->colaborador == 1)
            <h6><i class="far fa-check-circle"></i> Colaborador</h6>
            @endif
            @if($usuario->deportista == 1)
            <h6><i class="far fa-check-circle"></i> Deportista</h6>
            @endif
                           
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIE</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(Auth()->user()->nie == null)
                                                <p class="text-danger">Por favor ingresa tu nie</p>
                                                @else
                                                <p>{{Auth()->user()->nie}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Edad</label>
                                            </div>
                                            <div class="col-md-6">
                                               @if(Auth()->user()->edad == null)
                                                <p class="text-danger">Por favor ingresa tu edad</p>
                                                @else
                                                <p>{{Auth()->user()->edad}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                               @if(Auth()->user()->email == null)
                                                <p class="text-danger">Por favor ingresa tu email</p>
                                                @else
                                                <p>{{Auth()->user()->email}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tel</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(Auth()->user()->tel == null)
                                                <p class="text-danger">Por favor ingresa tu tel</p>
                                                @else
                                                <p>{{Auth()->user()->tel}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexo</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(Auth()->user()->sexo == null)
                                                <p class="text-danger">Por favor ingresa tu sexo</p>
                                                @else
                                                <p>{{Auth()->user()->sexo}}</p>
                                                @endif
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Direccion</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(Auth()->user()->direccion == null)
                                                <p class="text-danger h6">por favor agrega tu direccion</p>
                                                @else
                                                <p>{{Auth()->user()->direccion}}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Informacion sobre mi salud</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if(Auth()->user()->datos_salud == null)
                                                <p class="text-danger h6">por favor agrega informacion sobre tu salud para emergencias</p>
                                                @else
                                                <p>{{Auth()->user()->datos_salud}}</p>
                                                @endif
                                            </div>
                                        </div>
                         
                            </div>
                   

                        </div>
                    </div>
                </div>

<ul class="list-group pc">
<li class="list-group-item color">
  <button type="button" class="btn-sm btn btn-danger  " data-toggle="modal" data-target="#exampleModa3">
                            Reporte  <i class="fas fa-bug"></i>
                            </button>
                            <a href="{{route('verNotas')}}" class="btn-sm btn btn-primary text-white"> <i class="fas fa-list-ol"></i> Notas </a>
                             <a title="editar perfil" href="{{route('editarPerfil')}}" class="btn-sm btn btn-secondary text-white"><i class="fas fa-user-edit"></i>Mis datos</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reportalo todo es anonimo <i class="far fa-angry"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('nuevoReporte')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Cuentanos tu problema</label>

                            <div class="col-md-6">
                            <textarea required  name="reporte" class="form-control" rows="5" cols="20"></textarea>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Reportar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>   

</li>
<li class="list-group-item">Nombre : {{Auth()->user()->name}} {{Auth()->user()->apellidos}}</li>
<li class="list-group-item">Nie : {{Auth()->user()->nie}}</li>
<li class="list-group-item">Nivel : {{$nivel->nameNivel}}</li>
<li class="list-group-item">Edad : {{Auth()->user()->edad}}</li>

<li class="list-group-item">Tel : @if(Auth()->user()->tel == null) 
    <small class="text-danger">Por favor agregar tu tel</small>
    @else
    {{Auth()->user()->tel}}
@endif
    </li>

</ul>
<ul class="list-group pc" >
    <h6>Honores</h6>
       @if($usuario->excelencia == 1)
            <h6><i class="far fa-check-circle"></i>Excelencia</h6>
            @endif
            @if($usuario->responsable == 1)
            <h6><i class="far fa-check-circle"></i> Responsable</h6>
            @endif
            @if($usuario->puntual == 1)
            <h6><i class="far fa-check-circle"></i> Puntual</h6>
            @endif
            @if($usuario->estudioso == 1)
            <h6><i class="far fa-check-circle"></i> Estudioso</h6>
            @endif
            @if($usuario->colaborador == 1)
            <h6><i class="far fa-check-circle"></i> Colaborador</h6>
            @endif
            @if($usuario->deportista == 1)
            <h6><i class="far fa-check-circle"></i> Deportista</h6>
            @endif
</ul>




                    
        </div>
        @endforeach
@endsection
