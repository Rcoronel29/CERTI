@extends('adminlte::page')

@section('title', 'Evidencia')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-yellow card-outline">
                <div class="card-header"><h1 align="center">Crear nuevo Certificado</h1></div>

                <div class="card-body">
                    <form method="POST" action="/certificados" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nregistro" class="col-md-4 col-form-label text-md-right">{{ __('Número de Registro del Certificado') }}</label>

                            <div class="col-md-6">
                                <input id="nregistro" type="text" class="form-control @error('nregistro') is-invalid @enderror" required name="nregistro" autofocus>

                                @error('nregistro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                            <input id="dni" name="" type="number" class="form-control" tabindex="1" onchange="showUsuarios(this.value)" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                            <select name="name" id="name" class="form-control" >
            
                            </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombreCurso" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>
                            <div class="col-md-6">
                                <select id="nombreCurso" name="nombreCurso" class="form-control" tabindex="1">
                                    <option value="">Seleccionar Curso</option>
                                    <!-- Aquí puedes iterar sobre los cursos disponibles y generar opciones -->
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->nombreCurso }}" data-nivel="{{ $curso->nivel }}">{{ $curso->nombreCurso }} <!--- {{ $curso->nivel }}--></option>
                                    @endforeach
                                </select>
                                
                                @error('nombreCurso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel de Curso') }}</label>
                            <div class="col-md-6">
                                <input id="nivel" type="text" class="form-control" name="nivel" readonly>
                            </div>
                        </div>
                                           



                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" required>

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento" type="file" class="form-control-file @error('documento') is-invalid @enderror" name="documento"  autocomplete="documento" required>

                                @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/accions" class="btn btn-danger" tabindex="4">Cancelar</a>
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
<script>
    // Obtener el nivel del curso seleccionado y mostrarlo en el campo de nivel
    document.getElementById('nombreCurso').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var nivelInput = document.getElementById('nivel');
        if (selectedOption.dataset.nivel) {
            nivelInput.value = selectedOption.dataset.nivel;
        } else {
            nivelInput.value = '';
        }
    });
</script>

<script>
    function showUsuarios(id) {
      $.get("/api/usuarios/"+id, function(usuarios){
        let selectUsuarios = document.querySelector("#name");
        selectUsuarios.innerHTML = "";
        usuarios.forEach(usuario => {
          let option = document.createElement("option");
          option.setAttribute("value", usuario.id);
          option.innerHTML = usuario.name;
          selectUsuarios.appendChild(option);
        });
    });
    
  }
</script>
<script>
   window.addEventListener("load",function(){
    document.getElementById("nombreCurso").addEventListener("change",function(){
                    const selectedOption = this.options[this.selectedIndex];

        console.log("Solicitud fetch enviada");
        const url = `/certificados/buscador?texto=${document.getElementById("nombreCurso").value}`;
        console.log("URL de solicitud:", url);

        fetch(url, {
            method: 'get'
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById("resultados").innerHTML = html;
        })
        .catch(error => {
            console.error("Error en la solicitud fetch:", error);
        });
    })
})
</script>
    
@stop