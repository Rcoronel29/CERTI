@if (count($cursos))
    @foreach ($cursos as $curso)
        <p>{{$curso->id.'-'.$curso->nombreCurso}}</p>
    @endforeach                                    
@endif