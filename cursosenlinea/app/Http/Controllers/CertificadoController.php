<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificado;
use App\Models\Curso;

class CertificadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:certificados.index')->only('index');
        $this->middleware('can:certificados.create')->only('create', 'store');
        $this->middleware('can:certificados.edit')->only('edit', 'update');
        $this->middleware('can:certificados.destroy')->only('destroy');
        $this->middleware('can:certificados.view')->only('general');
    }
    
    public function index()
    {
        $usuario = Auth::user()->id;
        $certificados = Certificado::where('estado', '1')->orderby('updated_at','desc')->paginate(10);
        return view('certificado.index')->with('certificados',$certificados);
    }


    public function buscador(Request $request) {
        $texto = $request->input('texto');
    
        // Realiza la lógica de búsqueda de cursos por nombre aquí
        $cursos = Curso::where('nombreCurso', 'like', '%'.$texto.'%')->get();
    
        return view('partials.lista_cursos', compact('cursos'));
    }


    public function general()
    {
        $certificados = Certificado::where('estado', '1')->orderby('updated_at','desc')->paginate(10);
        return view('certificado.view')->with('certificados',$certificados);
    }

    public function download($id)
    {
        $Certificado = Certificado::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $Certificado->enlace);
        
        // Verificar si el archivo existe antes de descargarlo
        
        return response()->download($pathToFile);
    }

    public function buscar(Request $request){
        $usuario = Auth::user()->id;
        $texto=trim($request->get('texto'));
        $fecha=trim($request->get('fecha'));
        $certificados = Certificado::where("nombreCertificado","LIKE","%".$texto."%")
        ->where("updated_at","LIKE","%".$fecha."%")
        ->where('estado', '1')
        ->where('idUser', $usuario)
        ->orderBy('updated_at','desc')
        ->paginate(10);
        return view('certificado.index')->with('certificados',$certificados);
    }

    public function create()
    {

        $cursos = Curso::all(); // Suponiendo que tienes un modelo Curso

            return view('certificado.create', compact('cursos'));



       
    }

    public function obtenerCursos()
{
    $cursos = Curso::pluck('nombreCurso', 'id'); // Suponiendo que 'nombre' es el nombre del curso y 'id' es el ID del curso
    return response()->json($cursos);
}

    
    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|mimetypes:application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:22048',
        ]);

        $file = $request->file('documento');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $dateTimeNow = now()->format('Ymd_His');
        $fileContent = $request->get('nregistro').' '.$dateTimeNow.'.'. $extension;
        $route = 'certificado';
        
        // Asegurarse de que la carpeta existe y tiene los permisos correctos
        Storage::makeDirectory('public/' . $route);
        Storage::disk('public')->setVisibility($route, 'public');
        
        // Almacenar el archivo con la función storeAs()
        Storage::putFileAs('public/' . $route, $file, $fileContent);
        
        $certificados = new Certificado;
        $certificados->enlace = $route . '/' . $fileContent;
        $certificados->nregistro = $request->get('nregistro');
        switch($extension){
            case 'doc':
                $certificados->archivo = 'fas fa-file-word';
                $certificados->color = 'blue';
                break;
            case 'docx':
                $certificados->archivo = 'fas fa-file-word';
                $certificados->color = 'blue';
                break;
            case 'png':
                $certificados->archivo = 'fas fa-file-image';
                $certificados->color = 'darkturquoise';
                break;
            case 'jpg':
                $certificados->archivo = 'fas fa-file-image';
                $certificados->color = 'darkturquoise';
                break;
            case 'jpeg':
                $certificados->archivo = 'fas fa-file-image';
                $certificados->color = 'darkturquoise';
                break;
            case 'pdf':
                $certificados->archivo = 'fas fa-file-pdf';
                $certificados->color = 'red';
                break;
            case 'ppt':
                $certificados->archivo = 'fas fa-file-powerpoint';
                $certificados->color = 'orange';
                break;
            case 'pptm':
                $certificados->archivo = 'fas fa-file-powerpoint';
                $certificados->color = 'orange';
                break;
            case 'pptx':
                $certificados->archivo = 'fas fa-file-powerpoint';
                $certificados->color = 'orange';
                break;
            case 'xlm':
                $certificados->archivo = 'fas fa-file-excel';
                $certificados->color = 'green';
                break;
            case 'xls':
                $certificados->archivo = 'fas fa-file-excel';
                $certificados->color = 'green';
                break;   
            case 'xlsm':
                $certificados->archivo = 'fas fa-file-excel';
                $certificados->color = 'green';
                break;
            case 'xlsx':
                $certificados->archivo = 'fas fa-file-excel';
                $certificados->color = 'green';
                break;
        }
        $certificados->nombreCurso = $request->get('nombreCurso');
        $certificados->nivel = $request->get('nivel');
        $certificados->fecha = $request->get('fecha');
        $certificados->idUser = $request->get('name');
        $certificados->estado = 1;
        $certificados->save();
        
        return redirect('/certificados');
    }

    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        $certificado = Certificado::findOrFail($id);
        $cursos = Curso::all();
        return view('certificado.edit', compact('certificado', 'cursos'));
    
    }

    
    public function update(Request $request, Certificado $certificado)
    {
        //dd($request)->all();
        $request->validate([
            'documento' => 'required|mimetypes:application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:22048',
        ]);
        
        $file = $request->file('documento');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $dateTimeNow = now()->format('Ymd_His');
        $fileContent = $request->get('nregistro').' '.$dateTimeNow.'.'. $extension;
        $route = 'certificado';
        
        // Asegurarse de que la carpeta existe y tiene los permisos correctos
        Storage::makeDirectory('public/' . $route);
        Storage::disk('public')->setVisibility($route, 'public');
        
        // Almacenar el archivo con la función storeAs()
        Storage::putFileAs('public/' . $route, $file, $fileContent);
         // Eliminar el archivo antiguo
        Storage::delete('public/'.$certificado->enlace);

        $certificado->enlace = $route . '/' . $fileContent;
        $certificado->nregistro = $request->get('nregistro');
        switch($extension){
            case 'doc':
                $certificado->archivo = 'fas fa-file-word';
                $certificado->color = 'blue';
                break;
            case 'docx':
                $certificado->archivo = 'fas fa-file-word';
                $certificado->color = 'blue';
                break;
            case 'png':
                $certificado->archivo = 'fas fa-file-image';
                $certificado->color = 'darkturquoise';
                break;
            case 'jpg':
                $certificado->archivo = 'fas fa-file-image';
                $certificado->color = 'darkturquoise';
                break;
            case 'jpeg':
                $certificado->archivo = 'fas fa-file-image';
                $certificado->color = 'darkturquoise';
                break;
            case 'pdf':
                $certificado->archivo = 'fas fa-file-pdf';
                $certificado->color = 'red';
                break;
            case 'ppt':
                $certificado->archivo = 'fas fa-file-powerpoint';
                $certificado->color = 'orange';
                break;
            case 'pptm':
                $certificado->archivo = 'fas fa-file-powerpoint';
                $certificado->color = 'orange';
                break;
            case 'pptx':
                $certificado->archivo = 'fas fa-file-powerpoint';
                $certificado->color = 'orange';
                break;
            case 'xlm':
                $certificado->archivo = 'fas fa-file-excel';
                $certificado->color = 'green';
                break;
            case 'xls':
                $certificado->archivo = 'fas fa-file-excel';
                $certificado->color = 'green';
                break;   
            case 'xlsm':
                $certificado->archivo = 'fas fa-file-excel';
                $certificado->color = 'green';
                break;
            case 'xlsx':
                $certificado->archivo = 'fas fa-file-excel';
                $certificado->color = 'green';
                break;
        }
        $certificado->nombreCurso = $request->get('nombreCurso');
        $certificado->nivel = $request->get('nivel');
        $certificado->fecha = $request->get('fecha');
        $certificado->idUser = $request->get('name');
        $certificado->estado = 1;
        $certificado->save();
        
        return redirect('/certificados');
    }

   
    public function destroy(Certificado $certificado)
    {
        $certificado->estado = 0;
        $certificado->save();
        return redirect('/certificados');
    }

    
    


}
    