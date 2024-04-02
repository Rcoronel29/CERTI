<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Nivel;

class CursoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:cursos.index')->only('index');
        $this->middleware('can:cursos.create')->only('create', 'store');
        $this->middleware('can:cursos.edit')->only('edit', 'update');
        $this->middleware('can:cursos.destroy')->only('destroy');
        $this->middleware('can:cursos.view')->only('general');
    }
    
    public function index()
    {
        $usuario = Auth::user()->id;
        $cursos = Curso::where('estado', '1')->orderby('updated_at','desc')->paginate(10);
        return view('curso.index')->with('cursos',$cursos);
    }
    public function general()
    {
        $cursos = Curso::where('estado', '1')->orderby('updated_at','desc')->paginate(10);
        return view('curso.view')->with('cursos',$cursos);
    }

    public function buscar(Request $request){
        $usuario = Auth::user()->id;
        $texto=trim($request->get('texto'));
        $cursos = Curso::where("nombreCurso","LIKE","%".$texto."%")
        ->where('estado', '1')
        ->orderBy('updated_at','desc')
        ->paginate(10);
        return view('curso.index')->with('cursos',$cursos);
    }
    
    public function create()
    {
        return view('curso.create');
        
    
      
    }

    
    public function store(Request $request)
    {
        $cursos = new Curso;
        $cursos->nombreCurso = $request->get('nombreCurso');
        $cursos->nivel = $request->get('nivel');
        $cursos->horas = $request->get('horas');
        $cursos->lugar = $request->get('lugar');
        $cursos->idUser = Auth::user()->id;
        $cursos->estado = 1;
        $cursos->save();
        
        return redirect('/cursos');
    }

    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('curso.edit')->with('curso', $curso);
    }

    
    public function update(Request $request, Curso $curso)
    {
        $curso->nombreCurso = $request->get('nombreCurso');
        $curso->nivel = $request->get('nivel');
        $curso->horas = $request->get('horas');
        $curso->lugar = $request->get('lugar');
        $curso->idUser = Auth::user()->id;
        $curso->estado = 1;
        $curso->save();
        
        return redirect('/cursos');
    }

   
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
    
        return redirect()->route('cursos.index')->with('success', 'El curso ha sido eliminado correctamente');
    }
    
}
