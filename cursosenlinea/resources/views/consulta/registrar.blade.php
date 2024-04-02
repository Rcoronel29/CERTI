@extends('consulta.index')

@section('contenidoPrincipal')
<!-- RESULTADO DE BUSQUEDA  https://getbootstrap.com/docs/4.0/components/forms/ Boostrap para formularios-->
<h1 class="titulo2">Ingresar correctamente los datos</h1>
  
    <form method="POST" action="{{ route('consultas.update', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
              <label for="validationServer01">Nombres</label>
              <input type="text" name="nombres" class="form-control" id="validationServer01" placeholder="Nombres" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer02">Apellidos</label>
              <input type="text" name="apellidos" class="form-control" id="validationServer02" placeholder="Apellidos"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServerUsername">Correo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend3">@</span>
                </div>
                <input type="text" name="correo" class="form-control" id="validationServerUsername" placeholder="Correo" aria-describedby="inputGroupPrepend3" required>
              </div>
            </div>            
            <div class="col-md-4 mb-3">
              <label for="validationServer01">Direccion</label>
              <input type="text" name="direccion" class="form-control" id="validationServer01" placeholder="Direccion" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer02">Celular</label>
              <input type="text" name="celular" class="form-control" id="validationServer02" placeholder="Celular" pattern="[0-9]{9}" required>
            </div>
            <div class="col-md-3 mb-3">
              <label></label>              
              <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
            </div>         
          </div>
    </form>
    <br>
    <br>
@endsection
