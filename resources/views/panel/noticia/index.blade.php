@extends('plantilla.panel')


@section('container')
<h6>Noticias</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<a class="btn btn-primary" href="{{route('noticia.create')}}">Agregar <i class="fas fa-plus-circle"></i></a>
 <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                 
                    <th>Titulo</th>
                    <th>Fecha</th>
       
          			<th>Aciones</th>
                
                  </tr>
                </thead>
         
                <tbody>
                  @foreach($noticias as $noticia)
                <tr>
                  
           
             
                  <td>{{$noticia->titulo}}</td>
                   <td>{{ date('d-M-y', strtotime($noticia->created_at)) }}</td>
                   <td>
                   	<form action="{{route('noticia.destroy',$noticia->id)}}" method="post">
						@csrf()
						@method('DELETE')
          
		<button type="button" class="btn-sm btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$noticia->id}}">
		<i class="far fa-eye"></i>
		</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$noticia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Noticia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h3>{{$noticia->titulo}}</h3>
  		    	@if($noticia->foto == null)
                  	<img class="card-img" src="img/noticiaD.png">
                  	@else
                  	<img class="card-img" src="../storage/app/{{$noticia->foto}}">
                  	@endif

        <small>{{$noticia->noticia}}</small>
      </div>
      <div class="modal-footer">
      	<small class="h6">Autor: {{$noticia->name}}   </small>
        <small class="h6">Fecha:{{ date('d-M-y', strtotime($noticia->created_at)) }}</small>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> 
        <a class="btn-sm btn btn-info" href="{{route('noticia.show',Crypt::encrypt($noticia->user_id))}}"><i class="fas fa-user"></i></a>
        <a class="btn-sm btn btn-primary" href="{{route('noticia.edit',Crypt::encrypt($noticia->id))}}"><i class="far fa-edit"></i></a>
                   		<button class="btn-sm btn btn-danger" onClick="confirm('Seguro quieres eliminarlo?')"><i class="far fa-trash-alt"></i></button>
                   	</form>
                   </td>
                
     </tr>  
        @endforeach
                </tbody>
              
              </table>
@endsection