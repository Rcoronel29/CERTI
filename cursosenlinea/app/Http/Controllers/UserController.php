<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::where('estado', '1')->orderby('id')->paginate(10);
        return view('user.index')->with('users',$users);
    }

    public function create()
    {
        return view('user.create');
    }
    public function buscar(Request $request){
        $texto=trim($request->get('texto'));
        $cargos=trim($request->get('cargos'));
        $users = User::where("dni","LIKE","%".$texto."%")
        ->where("cargo","LIKE","%".$cargos."%")
        ->where('estado', '1')
        ->paginate(10);
        return view('user.index')->with('users',$users);
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->dni = $request->get('dni');
        $users->name = Str::upper($request->get('name'));
        $users->direccion = $request->get('direccion');
        $users->celular = $request->get('celular');
        $users->cargo = $request->get('cargo');
        $users->email = $request->get('email');
        $users->password = bcrypt($request->get('password'));
        $users->estado = 1;

        $users->save();
        return redirect('/users');
    }


    public function edit(User $user)
    {
        $roles =  Role::all();
        
        return view('user.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
       
        $user->roles()->sync($request->roles);
        

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->estado = '0';
        $user->save();
        return redirect('/users');
    }
}
