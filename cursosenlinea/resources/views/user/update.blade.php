@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-cyan card-outline">
                <div class="card-header"><h1 align="center">Editar Usuario</h1></div>

                <div class="card-body">
                    <form method="POST" action="/usuarios/{{$user->id}}" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" required name="dni" value="{{$user->dni}}" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos y Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" required name="name" value="{{$user->name}}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" required name="direccion" value="{{$user->direccion}}" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" required name="celular"  value="{{$user->celular}}" autofocus>

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-6">
                            <select id="cargo" name="cargo" class="form-control" >
                                <option value="{{$user->cargo}}">{{$user->cargo}}</option>
                                    <option value="Especialista DRE">Especialista DRE</option>
                                    <option value="Especialista UGEL">Especialista UGEL</option>
                                    <option value="Director">Director</option>
                                    <option value="Profesor Coordinador">Profesor Coordinador</option>
                                    <option value="Docente">Docente</option>
                                </select>
                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                            <input id="email" name="email" type="text" class="form-control" tabindex="1" value="{{$user->email}}" required size="50" maxlength="50"> 

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                            <input id="password" name="password" type="password" class="form-control" value="{{$user->password}}" tabindex="1" required size="50" maxlength="50"> 

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/users" class="btn btn-danger" tabindex="4">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
<style>
#name{
  text-transform: uppercase;
}
#provincia{
  text-transform: uppercase;
}
#distrito{
  text-transform: uppercase;
}
    </style>
@stop

@section('js') 
<script>
  function showInstituciones(id) {
    $.get("/api/instituciones/"+id, function(instituciones){
      let selectInstituciones = document.querySelector("#institucion");
      selectInstituciones.innerHTML = "";
      instituciones.forEach(institucion => {
        let option = document.createElement("option");
        option.setAttribute("value", institucion.nomInstitucion);
        option.innerHTML = institucion.nomInstitucion;
        selectInstituciones.appendChild(option);
      });
    });
  }
</script>  
@stop