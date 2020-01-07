@extends('plantilla.panel')


@section('container')
<h6>Reportes Generales</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
  <table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Reporte</th>
                    <th>Fecha</th>
                    <th>User</th>
          			<th>Nie</th>	
                    <th>Aciones</th>
                
                  </tr>
                </thead>
         
                <tbody>
                  @foreach($reportes as $reporte)
                  <tr>
                  	<td style="width: 500px">{{$reporte->reporte}}</td>
                  	<td>{{ date('d-M-y', strtotime($reporte->created_at)) }}</td>
                  	<td>{{$reporte->name}}</td>
                  	<td>{{$reporte->nie}}</td>
                  	<td scope="row">

<button type="button" class="btn-sm btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$reporte->id}}">
  <i class="far fa-eye"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$reporte->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <p>{{$reporte->reporte}}</p>
      </div>
      <div class="modal-footer">
      	<small class="h6">Autor: {{$reporte->name}}   </small>
        <small class="h6">Fecha:{{ date('d-M-y', strtotime($reporte->created_at)) }}</small>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                  			 <a class="btn-sm btn btn-info" href="{{url('verReporte',Crypt::encrypt($reporte->user_id))}}"><i class="fas fa-search"></i></a>
                  		





  <button type="button" class="btn-sm btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModa{{$reporte->id}}1">
  <i class="fas fa-trash-alt"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModa{{$reporte->id}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Eliminar Reporte</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form action="{{ url('deleteReporte', $reporte->id) }}" method="post" enctype="multipart/form-data">
  @csrf()
  @method('DELETE')

  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
  </form>
  </div>

  </div>

  </div>
  </div>
                  	</td>
              

          
                   
                  </tr>
                @endforeach
                </tbody>
              </table>

@endsection