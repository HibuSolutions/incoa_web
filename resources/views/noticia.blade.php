@extends('plantilla.cliente')

@section('content')

@foreach($noticia as $noticia)
<div class="card mb-3" style="max-width: 1440px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      		@if($noticia->foto == null)
	<img class="card-img" src="../img/noticiaD.png" style="">
	@else
	<a target="_blank" href="../../storage/app/{{$noticia->foto}}"><img class="card-img" src="../../storage/app/{{$noticia->foto}}" style=""></a>
	@endif
	<div id="fb-root "></div>


<div class="fb-share-button mt-2 mb-2 mr-2 ml-2" data-href="https://incoa.online/verNoticia/{{$noticia->id}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>

</div>

<a class="btn-sm btn btn-danger mt-2  " href="{{url('/')}}">Regresar <i class="fas fa-undo-alt"></i></a>

<small class="btn-sm btn btn-primary mt-2">Autor: {{$noticia->name}} </small>	
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>		
		
		<hr>
		
		
		
		

    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title ">{{$noticia->titulo}}</h5>
        <p class="card-text cajita">{{$noticia->noticia}}</p>
        <hr>
        <p class="card-text"><small class="text-muted">{{ date('d-M-y', strtotime($noticia->created_at)) }}  	</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
