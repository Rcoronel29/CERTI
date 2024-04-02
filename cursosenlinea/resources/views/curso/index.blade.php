@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/favicon.png') }}">
<link rel="shortcut icon" type="image/icon" href="{{asset('favicons/favicon.png')}}">
@endsection

@section('title', 'Cursos')

@section('content_header')
    <h1>Listado de Cursos</h1>
@stop

@section('content')

<form action="{{route('buscarCurso')}}" method="get" class="row g-3">
 <div class="form-group col-md-3">
                <div class="col align-self-center">
                <div class="input-group-prepend">
                <span class="input-group-text">
                 <i class="fas fa-file"></i>
                </span>
                    <input type="text" class="form-control" name="texto" Placeholder="Nombre del curso">
                    
                </div>
                </div>
                </div>
                <div class="form-group col-md-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
                
        
        </form>

<a href="cursos/create" class="btn btn-primary mb-3">+ NUEVO CURSO</a>

<table id="cursos" class="table table-striped table-bordered shadow-lg mt-4 display nowrap" style="width:100%">
                    <thead class="bg-primary text-white">
                    <tr>   
                    <th scope="col">Nombre del curso</th>
                    <th scope="col">Nivel del curso</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">idUser</th>
                    <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody >
                    @if(count($cursos)<=0)
                    <tr>
                        <td colspan="8">No hay Cursos</td>
                    </tr>
                    @else
                    @foreach ($cursos as $curso)
                    <tr>
                        <td>{{$curso->nombreCurso}}</td>
                        <td>{{$curso->nivel}}</td>
                        <td>{{$curso->horas}}</td>
                        <td>{{date('d-m-Y', strtotime($curso->updated_at))}}</td>
                        <td>{{$curso->lugar}}</td>
                        <td>{{$curso->getUser->name}}</td>

                        <td>
                            <form id="deleteForm{{$curso->id}}" action="{{ route ('cursos.destroy', $curso->id) }}" method="POST">
                                <a href="/cursos/{{ $curso->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $curso->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        
                        

                    </tr>
                    @endforeach
                     @endif
                     </tbody>
                     </table>
                     <div class="form-inline">
                        <p>Total de cursos Subidos: {{$cursos->total()}}</p> <br>
                        {{$cursos->links()}}
                     </div>
                     
                          
                    
@stop

@section('css')
 
@stop

@section('js')

<script>
    function confirmDelete(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este curso?')) {
            document.getElementById('deleteForm'+id).submit();
        }
    }
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() 
{

$('#cursos').DataTable(
{
    scrollX: true,
    "bInfo" : false,
    "bPaginate": false, 
    "bFilter": false 
});
});
</script>
@stop