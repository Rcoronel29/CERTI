@extends('adminlte::page')

@section('title', 'Cursos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-red card-outline">
                <div class="card-header"><h1 align="center">Editar Curso</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.update', $curso->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nombreCurso" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Curso') }}</label>

                            <div class="col-md-6">
                                <input id="nombreCurso" type="text" class="form-control @error('nombreCurso') is-invalid @enderror" name="nombreCurso" value="{{ $curso->nombreCurso }}" required autocomplete="nombreInforme" autofocus>

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
                                    <option value="inicio">Inicio</option>
                                    <option value="intermedio">Intermedio</option>
                                    <option value="avanzado">Avanzado</option>
                                </select>
                            </div>
                        </div>

                       





                        <div class="form-group row">
                            <label for="horas" class="col-md-4 col-form-label text-md-right">{{ __('Horas') }}</label>

                            <div class="col-md-6">
                                <input id="horas" type="text" class="form-control @error('horas') is-invalid @enderror" name="horas" value="{{ $curso->horas }}" required autocomplete="horas" autofocus>

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
                                <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror" name="lugar" value="{{ $curso->lugar }}" required autocomplete="lugar" autofocus>

                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/cursos" class="btn btn-danger" tabindex="4">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar cambios') }}
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