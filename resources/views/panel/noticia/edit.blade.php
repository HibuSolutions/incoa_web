@extends('plantilla.panel')


@section('container')
<div class="col-lg-6">
<h6>Editar Noticia</h6>
<div>
	<small></small>
</div>
		<form class="" action="{{route('noticia.update',$noticia->id)}}" method="post" enctype="multipart/form-data">
			@method('PATCH') 

			@csrf
			<div class="form-group">
			<h6 for="titulo">Titulo</h6>
			<input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}" >
			</div>
			
			<div class="form-group">
			<h6 for="noticia">Fotografia</h6>
			@if($noticia->foto == null)
			<img class="img-fluid img-thumbnail" src="../../img/noticiaD.png">
			@else
			<img class="img-fluid img-thumbnail" src="../../../storage/app/{{$noticia->foto}}">
			@endif
			<input class="mt-3" type="file" name="foto" >
			</div>


			<div class="form-group">
			<h6 for="noticia">Noticia</h6>
			<textarea class="form-control" name="noticia" cols="50" rows="10">{{$noticia->noticia}}</textarea>
			</div>
		
		
			<button class="btn btn-primary">Publicar</button>
			<a class="btn btn-danger" href="{{url('noticia')}}">Regresar</a>
			
		</form>	
</div>


		


	

@endsection