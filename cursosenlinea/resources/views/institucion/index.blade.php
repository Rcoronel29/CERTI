@extends('adminlte::page')
@section('css')

<link href=https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css>
<link href=https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css>
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/favicon.png') }}">
<link rel="shortcut icon" type="image/icon" href="{{asset('favicons/favicon.png')}}">
    <style>
        .dependencia {
            position: absolute;
            font-size: 20px;
        }
    </style>
@endsection

@section('title', 'Institucion')

@section('content_header')
    <h1>Listado de Institucion</h1>
@stop

@section('content')


<a href="institucions/create" class="btn btn-primary mb-3">CREAR</a>

<table id="institucions" class="table table-striped table-bordered shadow-lg mt-4 display nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Institución</th>
            <th scope="col">Cod. Modular</th>
            <th scope="col">Nivel</th>
            <th scope="col">Provincia</th>
            <th scope="col">Distrito</th>
            <th scope="col">Centro Poblado</th>
            <th scope="col">Ugel</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($institucions as $institucion)
        <tr>
            <td>{{$institucion->id}}</td>
            <td>{{$institucion->nomInstitucion}}</td>
            <td>{{$institucion->codModular}}</td>
            <td>{{$institucion->nivel}}</td>
            <td>{{$institucion->provincia}}</td>
            <td>{{$institucion->distrito}}</td>
            <td>{{$institucion->centropoblado}}</td>
            <td>{{$institucion->ugel}}</td>
            <td>
                <form action="{{  route ('institucions.destroy',$institucion->id)}}" method="POST">
                <a href="/institucions/{{ $institucion->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                @csrf
               
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<!--<script src=https://code.jquery.com/jquery-3.5.1.js></script>-->
<!--<script src=https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js></script>-->
<script src=https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script src=https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js></script>
<script src=https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js></script>
<script>
    $(document).ready(function() 
   {
    $('#institucions').DataTable(
        {
            scrollX: true,
            scrollY: true,
            language: {
                "sSearch": "BUSCAR:",
                "info": "MOSTRANDO DESDE EL INICIO AL FINAL DEL TOTAL DEREGISTROS",
                "infoFiltered": "(Filtrado un total de MAX registros)",
            },
           /* language: {
                "lengthMenu": "Mostrar MENU registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del START al END de un total de TOTAL registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de MAX registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },*/
        //"lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
        responsive: "true",
        dom: 'Bfrtip',
        buttons: [
            {
				extend:    'print',
				text:      '<i class="fas fa-print"> Imprimir</i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-warning'
			},
            {
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"> Excel</i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
            {
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"> PDF</i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
            {
				extend:    'csv',
				text:      '<i class="fas fa-file-csv"> CSV</i> ',
				titleAttr: 'Exportar a CSV',
				className: 'btn btn-info'
			},
            {
				extend:    'copy',
				text:      '<i class="fas fa-copy"> Copiar</i> ',
				titleAttr: 'Copiar Tabla',
				className: 'btn btn-secondary'
			},
        ]
        });
   } );
       
    function imprimir()
        {
       
        window.print();
       
        }
</script>

@stop