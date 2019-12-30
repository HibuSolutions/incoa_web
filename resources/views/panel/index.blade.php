@extends('plantilla.panel')


@section('container')
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="h3 mr-5">{{$usuariosTotal}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{url('usuarios')}}">
                <span class="float-left">Total de estudiantes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
           <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="h3 mr-5">{{$noticiasTotal}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{url('noticia')}}">
                <span class="float-left">Total de noticias</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-bullhorn"></i>
                </div>
                <div class="h3 mr-5">{{$avisosTotal}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{url('aviso')}}">
                <span class="float-left">Total de avisos</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-clipboard"></i>
                </div>
                <div class="h3 mr-5">{{$reportesTotal}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="{{url('reporte')}}">
                <span class="float-left">Total de reportes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
</div>
<hr>
<h5>Ultimos 5 Reportes</h5>
  
<table class="table table-bordered table-hover" width="100%" cellspacing="0">
<thead class="thead-dark">
<tr>

<th scope="col">Reportes</th>


</tr>
</thead>
<tbody>
@foreach($reportes as $reporte)
<tr>

<th  >{{$reporte->reporte}}</th>




</tr>
@endforeach
</tbody>
</table>       
      
@endsection