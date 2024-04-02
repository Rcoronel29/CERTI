<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\NivelController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('consulta.index');
});
/*
Route::get('/', function () {
    return view('auth.login');
     //return view('welcomenp');
});
*/

Route::get('/login', function () {
    return view('auth.login');
     //return view('welcomenp');        
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/inicio', function () {
    return view('admin.index');
});

Route::resource('institucions','App\Http\Controllers\InstitucionController');
Route::resource('users','App\Http\Controllers\UserController');
Route::resource('cursos','App\Http\Controllers\CursoController');
Route::resource('certificados','App\Http\Controllers\CertificadoController');
Route::resource('usuarios','App\Http\Controllers\UsuarioController');

Route::resource('consultas','App\Http\Controllers\ConsultaController');

Route::get('/certificados/buscador', 'CertificadoController@buscador');


Route::get('cursos/{id}/download', ['App\Http\Controllers\CursoController'::class, 'download'])->name('cursos.download');
Route::get('certificados/{id}/download', ['App\Http\Controllers\CertificadoController'::class, 'download'])->name('certificados.download');
Route::get('consulta/{id}/download', ['App\Http\Controllers\ConsultaController'::class, 'download'])->name('consulta.download');

Route::get("/buscar-usuario",['App\Http\Controllers\UserController'::class, "buscar"])->name('buscarUser')->middleware('auth');

Route::get("/buscar-certificado",['App\Http\Controllers\CertificadoController'::class, "buscar"])->name('buscarCertificado')->middleware('auth');
Route::get("/buscar-curso",['App\Http\Controllers\CursoController'::class, "buscar"])->name('buscarCurso')->middleware('auth');

Route::get("/buscar-consulta", "App\Http\Controllers\ConsultaController@buscar")->name('buscarConsulta');
Route::put('/consultas/{id}', ['App\Http\Controllers\ConsultaController', 'update'])->name('consultas.update');







