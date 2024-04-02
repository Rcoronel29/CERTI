@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/favicon.png') }}">
    <link rel="shortcut icon" type="image/icon" href="{{asset('favicons/favicon.png')}}">
@endsection

@section('title', 'Evidencia')

@section('content_header')
    <h1>Listado de Certificados</h1>
@stop

@section('content')

 <form action="{{route('buscarCertificado')}}" method="get" class="row g-3">
    <div class="form-group col-md-3">
        <div class="col align-self-center">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="fas fa-file"></i>
            </span>
                <input type="text" class="form-control" name="texto" Placeholder="Codigo del Certificado">
                
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="col align-self-center">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="fas fa-file"></i>
            </span>
                <input type="text" class="form-control" name="dni" Placeholder="Dni del Estudiante">
                
            </div>
        </div>
    </div>
    <div class="form-group col-md-1">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </div>
</form>

<a href="certificados/create" class="btn btn-primary mb-3">+ NUEVA ACCIÓN</a>

<table id="certificados" class="table table-striped table-bordered shadow-lg mt-4 display nowrap" style="width:100%">
                    <thead class="bg-primary text-white">
                    <tr>   
                    <th scope="col">Codigo del Certificado</th>
                    <th scope="col">Nivel del curso</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody >
                    @if(count($certificados)<=0)
                    <tr>
                        <td colspan="8">No hay Accion de Difusión y sensibilización</td>
                    </tr>
                    @else
                    @foreach ($certificados as $certificado)
                    <tr>
                        <td>{{$certificado->nregistro}}</td>
                        <td>{{$certificado->nivel}}</td>
                        <td>{{$certificado->getUser->dni}}</td>
                        <td>{{$certificado->getUser->name}}</td>
                        <td>{{$certificado->nombreCurso}}</td>
                        
                        <td>{{date('d-m-Y', strtotime($certificado->fecha))}}</td>
                        <td align="center"><a href="{{ route('certificados.download', $certificado->id) }}" , target="_blank"><i class='{{$certificado->archivo}}' style='font-size:24px;color:{{$certificado->color}}' ></i></a></td>
                        <td>
                            <form action="{{  route ('certificados.destroy',$certificado->id)}}" method="POST">
                            <a href="/certificados/{{ $certificado->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            @csrf
                        
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                     @endif
                     </tbody>
                     </table>
                     <div class="form-inline">
                        <p>Total de Acciones Subidos: {{$certificados->total()}}</p> <br>
                        {{$certificados->links()}}
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

$('#certificados').DataTable(
{
    scrollX: true,
    "bInfo" : false,
    "bPaginate": false, 
    "bFilter": false 
});
});
</script>
@stop