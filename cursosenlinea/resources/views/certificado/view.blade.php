@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('title', 'Evidencia')

@section('content_header')
    <h1>Listado de Acciones de Difusión y Sensibilización</h1>
@stop

@section('content')

    <form action="{{route('buscarAccionGeneral')}}" method="get" class="row g-3">
        <div class="form-group col-md-2">
            <div class="col align-self-center">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-file"></i>
                    </span>
                    <input type="text" class="form-control" name="texto" Placeholder="Nombre de la Acción">        
                </div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="col align-self-center">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-calendar"></i>
                    </span>
                    <input type="date" class="form-control" name="fecha" Placeholder="fecha de publicacion">
                </div>
            </div>
        </div>   
        <div class="form-group col-md-3">
            <div class="col align-self-center">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-calendar"></i>
                </span>
                    <div class="col-md-10">
                        <select id="nomdocente" name="nomdocente" class="form-control">
                            <option value="">----SELECCIONE DOCENTE-----</option>
                            @foreach ($accions as $accion)
                                <option value="{{$accion->name}}">{{$accion->name}}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="col align-self-center">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-calendar"></i>
                </span>
                    <div class="col-md-10">
                        <select id="nominstitucion" name="nominstitucion" class="form-control">
                            <option value="">----SELECCIONE INSTITUCION-----</option>
                            @foreach ($accions as $accion)
                                <option value="{{$accion->institucion}}">{{$accion->institucion}}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-1">
            <input type="submit" class="btn btn-primary" value="Buscar">
        </div>
    </form>

<table id="accions" class="table table-striped table-bordered shadow-lg mt-4 display nowrap" style="width:100%">
                    <thead class="bg-primary text-white">
                    <tr>   
                    <th scope="col">Nombre de la Acción</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Institución</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Ugel</th>
                    <th scope="col">Lugar</th>
                    </tr>
                    </thead>
                    <tbody >
                    @if(count($accions)<=0)
                    <tr>
                        <td colspan="8">No hay Accion de Difusión y sensibilización</td>
                    </tr>
                    @else
                        @if (count($rols) == 2) <!-- Esto es para Director -->
                        @foreach ($accions as $accion)
                        <tr>
                            <td>{{$accion->nombreAccion}}</td>
                            <td>{{$accion->descripcion}}</td>
                            <td>{{date('d-m-Y', strtotime($accion->updated_at))}}</td>
                            <td align="center"><a href="{{ route('accions.download', $accion->id) }}" , target="_blank"><i class='{{$accion->documento}}' style='font-size:24px;color:{{$accion->color}}' ></i></a></td>
                            <td>{{$accion->name}}</td>
                            <td>{{$accion->cargo}}</td>
                            <td>{{$accion->institucion}}</td>
                            <td>{{$accion->nivelinstitucion}}</td>
                            <td>{{$accion->provincia}}</td>
                            <td>{{$accion->distrito}}</td>
                            <td>{{$accion->ugel}}</td>
                            <td>{{$accion->lugar}}</td>
                        </tr>
                        @endforeach
                        @else  <!-- Esto es para DRE-->
                        @foreach ($accions as $accion)
                        <tr>
                            <td>{{$accion->nombreAccion}}</td>
                            <td>{{$accion->descripcion}}</td>
                            <td>{{date('d-m-Y', strtotime($accion->updated_at))}}</td>
                            <td align="center"><a href="{{ route('accions.download', $accion->id) }}" , target="_blank"><i class='{{$accion->documento}}' style='font-size:24px;color:{{$accion->color}}' ></i></a></td>
                            <td>{{$accion->getUser->name}}</td>
                            <td>{{$accion->getUser->cargo}}</td>
                            <td>{{$accion->getUser->institucion}}</td>
                            <td>{{$accion->getUser->nivelinstitucion}}</td>
                            <td>{{$accion->getUser->provincia}}</td>
                            <td>{{$accion->getUser->distrito}}</td>
                            <td>{{$accion->getUser->ugel}}</td>
                            <td>{{$accion->lugar}}</td>
                        </tr>
                        @endforeach
                        @endif
                    @endif
                     </tbody>
                     </table>
                     <div class="form-inline">
                        <p>Total de Acciones Subidos: {{$accions->total()}}</p> <br>
                        {{$accions->links()}}
                     </div>
                     
                          
                    
@stop

@section('css')
 
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() 
{

$('#accions').DataTable(
{
    scrollX: true,
    "bInfo" : false,
    "bPaginate": false, 
    "bFilter": false 
});
});
</script>
@stop