@extends('plantilla.cliente')

@section('content')
@if(Auth::user()->ciclo != 0)

	@foreach($notas as $nota)

	<div class="col-md-12 row">
		<ul class="list-group col-md-5">
		@if($nota->matematica != 0)	
		<li class="list-group-item h6">Matematica: {{$nota->matematica}}</li>
		@endif
		@if($nota->sociales   != 0)
		<li class="list-group-item h6">Sociales: {{$nota->sociales}}</li>
		@endif
		@if($nota->lenguaje   != 0)
		<li class="list-group-item h6">Lenguaje: {{$nota->lenguaje}}</li>
		@endif
		@if($nota->ciencias   != 0)
		<li class="list-group-item h6">Ciencia: {{$nota->ciencias}}</li>
		@endif
		@if($nota->opv != 0)
		<li class="list-group-item h6">Opv: {{$nota->opv}}</li>
		@endif
		@if($nota->fisica != 0)
		<li class="list-group-item h6">Fisica: {{$nota->fisica}}</li>
		@endif
		@if($nota->ingles != 0)
		<li class="list-group-item h6">Ingles: {{$nota->ingles}}</li>
		@endif
		@if($nota->seminario)
		<li class="list-group-item h6">Seminario: {{$nota->seminario}}</li>
		@endif
		@if($nota->tecnologia_comercial != 0)
		<li class="list-group-item h6">Tecnologia Comercial: {{$nota->tecnologia_comercial}}</li>
		@endif
		@if($nota->informatica != 0)
		<li class="list-group-item h6">Informatica: {{$nota->informatica}}</li>
		@endif
		@if($nota->creatividad != 0)
		<li class="list-group-item h6">Creatividad: {{$nota->creatividad}}</li>
		@endif
		</ul>
		<h6 class="mt-3 ml-3 pc">comentarios</h6>
		<div class="col-md-5 mt-3" style="max-height: 600px;overflow-y: scroll;">
		@foreach($comentarios as $comentario)	
		<div class="media  bg-primary text-white mt-2" style="border-radius: 5px">

		<div class="media-body " style="margin: 10px;">
		<h5 class="mt-0">{{$comentario->autor}}</h5>
		{{$comentario->comentario}}
		</div>

		</div>
		@endforeach
		</div>
	</div>
	@endforeach	

		<a class="btn btn-danger mr-3 ml-3 mt-3 mb-3" href="{{route('miperfil')}}">Regresar</a>
	
</div>
@else

<div class="text-center">
	<h6 class="text-danger">No tienes ciclo asignado recuerda que tienes que tener tus datos completos  para poder ver tus notas.
Completa tu perfil agregando tu Nie y tutor legal con su Dui si el error persiste reportalo con algun docente o directamente con tu director </h6>

<a class="btn btn-danger mr-3 ml-3 mt-3 mb-3" href="{{route('miperfil')}}">Regresar</a>
<h6 class="pc">comentarios</h6>
</div>
	<div class="col-md-12 mt-3" style="max-height: 600px;overflow-y: scroll;">
		@foreach($comentarios as $comentario)	
		<div class="media  bg-primary text-white mt-2" style="border-radius: 5px">

		<div class="media-body " style="margin: 10px;">
		<h5 class="mt-0">{{$comentario->autor}}</h5>
		{{$comentario->comentario}}
		</div>

		</div>
		@endforeach
		</div>
@endif
	

	

@endsection
