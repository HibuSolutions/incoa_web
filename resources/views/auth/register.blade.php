@extends('plantilla.cliente')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>
                <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                   <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                                 <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Edad</label>

                            <div class="col-md-6">
                                <input id="edad" type="number" class="form-control " name="edad" value="" required="" min="0" max="25">

                             
                            </div>
                        </div>
                                   <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-6">
                                                <select class="custom-select" name="sexo">
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
                                                <option value="Indefinido">Indefinido</option>
                                                </select>

                             
                            </div>
                        </div>


                           
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nie</label>


                            <div class="col-md-6 ">
                                <input  type="number" class="form-control " name="nie"  required="" placeholder="ingresa tu nie">


                            </div>
                     
                        </div>
                          <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Codigo Notas</label>


                            <div class="col-md-6 ">
                                <input  type="text" class="form-control " name="codigo"  required="" placeholder="ingresa tu codigo secreto personal">


                            </div>
                     
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nivel Academico</label>

                            <div class="col-md-6">
                    <select class="custom-select" name="nivel">
                        @foreach($nivel as $nivel)
                    <option value="{{$nivel->id}}">{{$nivel->nameNivel}}</option>
                  
                        @endforeach
                    </select>

                             
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Seccion</label>
                            <div class="col-md-6">
                                    <select class="custom-select" name="seccion">
                                @foreach($secciones as $seccion)
                                <option value="{{$seccion->seccion}}">{{$seccion->seccion}}</option>
                                @endforeach
                            </select>
                            </div>
                        
                        </div>
          

             
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6" >
                                                         
                                <button class="btn-sm btn-primary" type="button" onclick="mostrarContrasena()"><i class="far fa-eye"></i></button>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                                <a class="btn btn-danger" href="{{route('inicio')}}">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
