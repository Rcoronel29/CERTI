<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $user = User::findOrFail(Auth::id());
        return view('usuario.index', compact('user'));
    }

    public function store(Request $request){

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('/usuarios');
    }
   
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.update')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->dni = $request->get('dni');
        $user->name = Str::upper($request->get('name'));
        $user->direccion = $request->get('direccion');
        $user->celular = $request->get('celular');
        $user->cargo = $request->get('cargo');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->estado = 1;

        $user->save();
        return redirect('/users');
    }

   
}
?>