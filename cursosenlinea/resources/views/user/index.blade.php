@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('title', 'Usuario')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
<main>
<form action="{{route('buscarUser')}}" method="get" class="row g-3">
 <div class="form-group col-md-3">
                <div class="col align-self-center">
                <div class="input-group-prepend">
                <span class="input-group-text">
                 <i class="fas fa-file"></i>
                </span>
                    <input type="text" class="form-control" name="texto" Placeholder="Ingrese DNI">
                    
                </div>
                </div>
                </div>
                <div class="form-group col-md-3">
                <div class="col align-self-center">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-user-tie"></i>
                </span>
                    <input type="text" class="form-control" name="cargos" Placeholder="Ingrese el Cargo">
                </div>
                </div>
                </div>
                <div class="form-group col-md-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
                
        
        </form>

<a href="users/create" class="btn btn-primary mb-3">+ NUEVO USUARIO</a>

<table id="users" class="table table-striped table-bordered shadow-lg mt-4 display nowrap" style="width:100%">
                    <thead class="bg-primary text-white">
                    <tr>   
                    <th scope="col">DNI</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody >
                    @if(count($users)<=0)
                    <tr>
                        <td colspan="8">No hay Usuario</td>
                    </tr>
                    @else
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->dni}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cargo}}</td>
                        <td>{{$user->direccion}}</td>
                        <td>{{$user->celular}}</td>
                        <td>
                        {{--<a href="/users/{{ $user->id}}/edit" class="btn btn-info"><i class="fas fa-user-tag"></i></a>--}}
                        <a href="/usuarios/{{ $user->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{  route ('users.destroy',$user->id)}}" method="POST">
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
                        <p>Total de Usuarios: {{$users->total()}}</p> <br>
                        {{$users->links()}}
                     </div>
</main>
    <div id="subir__arriba">
        <i class="fas fa-angle-up"></i>
    </div>                    
                          
                    
@stop

@section('css')
<style>
        #subir__arriba{
    width: 70px;
    height: 70px;
    background: rgb(61, 68, 89);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    position: fixed;
    bottom: 20px;
    cursor: pointer;
    display: none;
}
    </style>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() 
   {

    $('#users').DataTable(
        {
            scrollX: true,
            "bInfo" : false,
            "bPaginate": false, 
            "bFilter": false 
        });
    });
        </script>
<script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <script>
    let caja=document.getElementById("subir__arriba");
        caja.addEventListener("click",function(){
            document.documentElement.scrollTop=0;
        })

        window.addEventListener("scroll",function(){
            if (document.documentElement.scrollTop > 0) {
                caja.style.display="flex"
            } else {
                caja.style.display="none"
            }
        })
</script>
@stop