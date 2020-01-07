@extends('plantilla.panel')


@section('container')
<h6>Historial</h6>
   @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Operacion Exitosa!</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif

       @if(session('Error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Lo sentimos!</strong>  {{ session('Error') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
<table class="  table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                 
                    <th>Fecha</th>
                    <th>nie</th>
                    <th>Nivel</th>
                    <th>Seccion</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
          			<th>Aciones</th>
                
                  </tr>
                </thead>
         
                <tbody>
                  @foreach($historial as $historia)
                <tr>
                 	<td>{{$historia->created_at}}</td> 
           	      <td>{{$historia->nie}}</td> 
                  <td>{{$historia->nivel}}</td> 
                  <td>{{$historia->seccion}}</td>
                  <td>{{$historia->nombre}}</td>
                  <td>{{$historia->apellido}}</td>
                  <td>
                      <a class="btn-sm btn btn-danger"  href="{{url('imprimir',$historia->id)}}">Boleta <i class="fas fa-print"></i></a>


<button type="button" class="btn-sm btn btn-info ml-1" data-toggle="modal" data-target="#exampleModa{{$historia->id}}12">Eliminar
<i class="fas fa-trash"></i>
</button>


<div class="modal fade" id="exampleModa{{$historia->id}}12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar historial?<i class="fas fa-user-times"></i></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <small>Solo se debe eliminar historial si en dado caso se dejo vacio campos por error</small>
<form action="{{url('eliminarHistorial',$historia->id)}}" method="get">
@csrf


<button type="submit" class="btn btn-danger btn-sm">confirmar</button>
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