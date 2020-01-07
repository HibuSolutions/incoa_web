@extends('plantilla.cliente')

@section('content')

<h4>INSTITUTO NACIONAL DE COATEPEQUE <img width="50" src="img/ui/escuela.png"></h4>
<h5>Alumno : {{$user->name}} {{$user->apellidos}}</h5>
<h5>Nie : {{$user->nie}}</h5>
<h5>Fecha Periodo : {{ date('d-M-y', strtotime($datos->created_at)) }}</h5>

<h5>Seccion : {{$user->seccion}}</h5>


<table class="table-sm table-bordered cel " >
  <thead>
    <tr>
      @if($datos->matematica )
      <th class="small">Matematicas</th>
      
      @endif
      @if($datos->lenguaje )
      <th class="small">lenguaje</th>
      
      @endif
      @if($datos->sociales )
      <th class="small">sociales</th>
      
      @endif
      @if($datos->ciencias )
      <th class="small">ciencias</th>
      
      @endif
       @if($datos->ingles )
      <th class="small">ingles</th>
      
      @endif
       @if($datos->fisica )
      <th class="small">fisica</th>
      
      @endif
       @if($datos->opv )
      <th class="small">opv</th>
      
      @endif
      @if($datos->seminario )
      <th class="small">seminario</th>
      
      @endif
      @if($datos->tecnologia_comercial )
      <th class="small">tecnologia comercial</th>
      @endif
      @if($datos->creatividad )
      <th class="small">creatividad</th>
      @endif
      @if($datos->informatica )
      <th class="small">informatica</th>
      @endif

    </tr>
  </thead>
  <tbody>
    <tr>
        @if($datos->matematica )
        <td>{{$datos->matematica}}</td>

        
        @endif
        @if($datos->lenguaje )
        <td>{{$datos->lenguaje}}</td>

        
        @endif
        @if($datos->sociales )
        <td>{{$datos->sociales}}</td>


        @endif
        @if($datos->ciencias )
        <td>{{$datos->ciencias}}</td>


        @endif
        @if($datos->ingles )
        <td>{{$datos->ingles}}</td>


        @endif
        @if($datos->fisica )
        <td>{{$datos->fisica}}</td>


        @endif
         @if($datos->opv )
        <td>{{$datos->opv}}</td>


        @endif
        @if($datos->seminario )
        <td>{{$datos->seminario}}</td>


        @endif
        @if($datos->tecnologia_comercial )
        <td>{{$datos->tecnologia_comercial}}</td>


        @endif
        @if($datos->creatividad )
        <td>{{$datos->creatividad}}</td>


        @endif
        @if($datos->informatica )
        <td>{{$datos->informatica}}</td>


        @endif









    </tr>
    

  </tbody>
</table>
	<ul class="list-group pc">
		@if($datos->matematica != 0)	
		<li class="list-group-item h6">Matematica: {{$datos->matematica}}</li>
		@endif
		@if($datos->sociales   != 0)
		<li class="list-group-item h6">Sociales: {{$datos->sociales}}</li>
		@endif
		@if($datos->lenguaje   != 0)
		<li class="list-group-item h6">Lenguaje: {{$datos->lenguaje}}</li>
		@endif
		@if($datos->ciencias   != 0)
		<li class="list-group-item h6">Ciencia: {{$datos->ciencias}}</li>
		@endif
		@if($datos->opv != 0)
		<li class="list-group-item h6">Opv: {{$datos->opv}}</li>
		@endif
		@if($datos->fisica != 0)
		<li class="list-group-item h6">Fisica: {{$datos->fisica}}</li>
		@endif
		@if($datos->ingles != 0)
		<li class="list-group-item h6">Ingles: {{$datos->ingles}}</li>
		@endif
		@if($datos->seminario)
		<li class="list-group-item h6">Seminario: {{$datos->seminario}}</li>
		@endif
		@if($datos->tecnologia_comercial != 0)
		<li class="list-group-item h6">Tecnologia Comercial: {{$datos->tecnologia_comercial}}</li>
		@endif
		@if($datos->informatica != 0)
		<li class="list-group-item h6">Informatica: {{$datos->informatica}}</li>
		@endif
		@if($datos->creatividad != 0)
		<li class="list-group-item h6">Creatividad: {{$datos->creatividad}}</li>
		@endif
		</ul>
<h6 class="mt-2">Comentarios generados sobre el estudiante durante el periodo <i class="fas fa-angle-down"></i></h6>
<ul class="card-body color text-white"> 

@foreach($comentarios as $comentario)
<li>{{$comentario->comentario}}</li>
@endforeach 
</ul>
<hr>
<small>Preguntas Frecuentes</small>
<ul>
  <li>Dudas con las notas?</li>
  <p>Usted puede consultar las notas directamente en el portal web incoa.online o desde la app descargandola desde el portal web o en playstore con el nombre incoa para poder buscar las notas necesita el codigo personal del estudiante</p>
  <li>Que es el codigo personal?</li>
  <p>El codigo personal se lo brindara el estudiante cuando el estudiante se registra en nuestra web digita un codigo personal privado el cual se entrega a los padres para poder ver las notas de sus hijos.</p>
</ul>


<img width="%80" src="img/qr.png">
@endsection
