@extends('plantilla.panel')


@section('container')

    <div class="row justify-content-center">
    @foreach($usuario as $usuario)
    <div class="col-md-9">
    <div class="card mb-3 " >
    <div class="row no-gutters">
    <div class="col-md-4">
    <div class="profile-img mt-1">
    @if($usuario->foto == null)
    <img src="../img/ui/perfilDefault.png" class="" alt="sube una foto de perfil"/>
    @else
    <img src="../../storage/app/{{$usuario->foto}}" class="" alt="sube una foto de perfil"/>
    @endif

    </div>

     <div class="profile-work ">

               <hr>
        <h5 class="text-info" ><i class="fas fa-medal"></i> Honores</h5>
         
            @if($usuario->excelencia == 1)
            <h6><i class="far fa-check-circle"></i>Excelencia</h6>
            @endif
            @if($usuario->responsable == 1)
            <h6><i class="far fa-check-circle"></i>Responsable</h6>
            @endif
            @if($usuario->puntual == 1)
            <h6><i class="far fa-check-circle"></i>Puntual</h6>
            @endif
            @if($usuario->estudioso == 1)
            <h6><i class="far fa-check-circle"></i>Estudioso</h6>
            @endif
            @if($usuario->colaborador == 1)
            <h6><i class="far fa-check-circle"></i>Colaborador</h6>
            @endif
            @if($usuario->deportista == 1)
            <h6><i class="far fa-check-circle"></i>Deportista</h6>
            @endif
        </div>
    </div>
    <div class="col-md-8">
    <div class="card-body">
    <h5 class="card-title">{{$usuario->name}} {{$usuario->apellidos}} </h5> <a class="btn-sm btn btn-danger" href="{{route('usuarios')}}"><i class="fas fa-undo-alt"></i> Regresar</a> 
     <p class="card-text"><small class="text-muted">Perfil creado el  {{ $usuario->created_at->format('Y-m-d') }} </small></p>
    <ul class="list-group hover">

    <li class="list-group-item">Nivel : {{$usuario->nameNivel}}</li>      
    <li class="list-group-item">Edad : {{$usuario->edad}}</li> 
    <li class="list-group-item">Sexo : {{$usuario->sexo}}</li>
    <li class="list-group-item">Dui Responsable : {{$usuario->dui_tutor}}</li>
    <li class="list-group-item">Nie : {{$usuario->nie}}</li>      
    <li class="list-group-item">Tel: {{$usuario->tel}}</li>
    <li class="list-group-item">Tel Responsable: {{$usuario->tel}}</li>
    <li class="list-group-item">Email: {{$usuario->email}}</li>
    <li class="list-group-item">Direccion : {{$usuario->direccion}}</li> 
    <li class="list-group-item">Info Salud : {{$usuario->datos_salud}}</li> 
    </ul>
   
    </div>
    </div>
    </div>
    </div>



    </div>
    @endforeach

    </div>
@endsection