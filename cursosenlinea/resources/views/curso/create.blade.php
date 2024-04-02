@extends('adminlte::page')

@section('title', 'Evidencia')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-red card-outline">
                <div class="card-header"><h1 align="center">Crear Nueva Evidencia</h1></div>

                <div class="card-body">
                    <form method="POST" action="/cursos" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombreCurso" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Curso') }}</label>

                            <div class="col-md-6">
                                <input id="nombreCurso" type="text" class="form-control @error('nombreCurso') is-invalid @enderror" required name="nombreCurso" autofocus>

                                @error('nombreCurso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>
                        
                            <div class="col-md-6">
                                <select id="nivel" class="form-control @error('nivel') is-invalid @enderror" name="nivel" required autocomplete="nivel">
                                    <option value="BASICO">BASICO</option>
                                    <option value="INTERMEDIO">INTERMEDIO</option>
                                    <option value="AVANZADO">AVANZADO</option>
                                 

                                </select>
                        
                                @error('nivel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="horas" class="col-md-4 col-form-label text-md-right">{{ __('horas') }}</label>

                            <div class="col-md-6">
                                <input id="horas" type="text" class="form-control @error('horas') is-invalid @enderror" name="horas" required autocomplete="horas">

                                @error('horas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lugar" class="col-md-4 col-form-label text-md-right">{{ __('Lugar') }}</label>

                            <div class="col-md-6">
                                <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror" name="lugar" required autocomplete="lugar">

                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/evidencias" class="btn btn-danger" tabindex="4">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
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
    
@stop

@section('js')
    
@stop