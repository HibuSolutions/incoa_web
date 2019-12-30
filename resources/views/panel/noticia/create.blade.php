@extends('plantilla.panel')


@section('container')
<center>
	<div class="col-md-12 ">
		<h6>Agregar Noticia</h6>
		<form action="{{route('noticia.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Titulo</label>

			<div class="col-md-6">
			   <input type="text" class="form-control" name="titulo"  required="">
			</div>
			</div>
				<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Foto</label>

			<div class="col-md-6  ">
			   <input type="file" class="form-control " name="foto"  >
			</div>
			</div>
			<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Noticia</label>

			<div class="col-md-6">
			   <textarea class="form-control" name="noticia" rows="5" cols="50" required=""></textarea>
			</div>
			</div>
			<button class="btn btn-primary">Publicar</button>
			<a class="btn btn-danger" href="{{url('noticia')}}">Regresar</a>
			
		</form>
	</div>
</center>
@endsection