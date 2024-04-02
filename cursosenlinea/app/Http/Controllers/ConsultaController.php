<?php

namespace App\Http\Controllers;

use App\Models\Consulta;/*
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ReCaptcha\ReCaptcha;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ReCaptcha\ReCaptcha;



use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ConsultaController extends Controller
{
    public function index()
    {
        
        $consultas = Consulta::all();
        return view('consulta.index')->with('consultas', $consultas);
    }
    public function buscar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dni' => 'required|max:8', // Agrega las reglas necesarias para el campo DNI
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $dni = trim($request->get('dni'));
    
            $consultas = Consulta::select("certificados.id","certificados.nregistro","certificados.archivo","certificados.color","certificados.nombreCurso","certificados.fecha","certificados.enlace","users.dni","users.name","certificados.nivel")
                    ->join("users","users.id","=","certificados.idUser")
                    ->where("users.dni","LIKE","%".$dni."%")
                    ->where('certificados.estado', '1')
                    ->orderBy('certificados.id','desc')
                    ->paginate(10);
    
            return view('consulta.descargar')->with('consultas', $consultas);
        }
    }
    


    public function download($id)
    {
        $consultas = Consulta::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $consultas->enlace);
        
        // Verificar si el archivo existe antes de descargarlo
        
        return response()->download($pathToFile);
    }

    public function create()
    {
    }
    public function store(Request $request)
    {        
    }    
    public function edit($id)
    {
    }
    public function show()
    {        
    }

    public function update(Request $request, string $id)
    {
        $consulta = Consulta::findOrFail($id);

        // Validación de los campos de actualización si es necesario
        // $validator = Validator::make(...);

        // Actualizar los campos según los datos del formulario
        $consulta->nombres = $request->input('nombres');
        $consulta->apellidos = $request->input('apellidos');
        $consulta->correo = $request->input('correo');
        $consulta->direccion = $request->input('direccion');
        $consulta->celular = $request->input('celular');

        // Cambiar el estado a 'completo' si lo deseas
        $consulta->estado = '1';

        $consulta->save();

        return redirect()->route('consultas.index')->with('message', 'Datos actualizados con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
