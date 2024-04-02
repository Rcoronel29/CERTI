@extends('consulta.index')

@section('contenidoPrincipal')
<!-- RESULTADO DE BUSQUEDA -->
<div class="table-responsive">
    <table id="table_data" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Numero de Registro</th>
                <th>Nombres y Apellidos</th>
                <th>DNI</th>
                <th>Curso</th>
                <th>Nivel del Curso</th>
                <th>Fecha</th>
                <th class="text-center">Archivo</th>
            </tr>
        </thead>
        <tbody>
            @if (count($consultas) != 0)
                @foreach ($consultas as $consulta)
                <tr>
                    <th>{{$consulta->nregistro}}</th>
                    <th>{{$consulta->name}}</th>
                    <th>{{$consulta->dni}}</th>
                    <th>{{$consulta->nombreCurso}}</th>
                    <th>{{$consulta->nivel}}</th>
                    <th>{{$consulta->fecha}}</th>
                    <th align="center"><a href="{{ route('consulta.download', $consulta->id) }}" , target="_blank"><i class='{{$consulta->archivo}}' style='font-size:24px;color:{{$consulta->color}}' ></i></a></th>
                            
                </tr>   
                @endforeach    
            @else
            <tr>
                <td colspan="6" class="text-center"><h2>NO SE ENCONTRO NINGÚN RESULTADO</h2></td>
            </tr> 
            @endif                                 
        </tbody>
    </table>
</div>
@endsection
