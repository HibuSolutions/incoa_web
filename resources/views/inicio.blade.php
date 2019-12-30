@extends('plantilla.cliente')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @foreach($noticias as $noticia)
        <div class="col-md-9">
<div class="card mb-3" style="">
  <div class="row no-gutters">
    <div class="col-md-4" >
      @if($noticia->foto == null)
      <img src="img/noticiaD.png" class="card-img" alt="...">
      @else
      <img src="../storage/app/{{$noticia->foto}}" class="card-img" alt="..." style="height: 250px;">
      @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$noticia->titulo}}</h5>
        
          
         
          

          <a class="btn btn-lg btn-info" href="{{route('verNoticia',Crypt::encrypt($noticia->id))}}"><i class="far fa-newspaper"></i> Ver mas..</a>
   
        <br>
        <br>
        <small class="">Autor: {{$noticia->name}} <i class="fas fa-pen"></i></small>
        <p class="card-text"><small class="text-muted">Fecha:{{ date('d-M-y', strtotime($noticia->created_at)) }}</small></p>
      </div>
    </div>
  </div>
</div>


  <!-- Your share button code -->




        </div>
        @endforeach

    </div>
    
</div>
<div class="float-right mr-3">
  {{$noticias->links()}}
</div>

@endsection
