@extends('plantilla.cliente')

@section('content')
<div class="container">
 
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                       @if(session('mensaje'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Lo sentimos !</strong>  {{ session('mensaje') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif

                           @if(session('adios'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hasta luego !</strong>  {{ session('adios') }} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

 

</div>
    @endif
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
                <div class="card-header"><img width="50" class="bounceInLeft animated " src="img/ui/escuela.png">   Acceder</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Clave</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn-sm btn   btn-primary">
                                    Acceder
                                </button>
                                <a href="{{route('register')}}" class="btn-sm btn btn-success">Registrate <i class="far fa-address-card"></i></a>




                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn-sm btn btn-warning mt-3  " data-toggle="modal" data-target="#exampleModa2">
    Notas <i class="fas fa-search"></i>
    </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buscador <i class="fas fa-server"></i></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('estudianteNotas')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="sobremi" class="col-md-4 col-form-label text-md-right">Ingresa el codigo</label>

                            <div class="col-md-6">
                          <input type="text" required="" class="form-control" name="codigo" >
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                            </form>
                            </div>

                            </div>

                            </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
