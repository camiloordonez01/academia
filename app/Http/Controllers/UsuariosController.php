<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request)
    {
    	$usuarios = DB::select('SELECT id, name, email, activo, tipo FROM users WHERE id <>'.Auth::user()->id);
    	return view('administrador.usuarios.index',['usuarios'=>$usuarios]);
    }
    public function edit($id)
    {
    	$usuario =User::findOrFail($id);
    	if($usuario->activo == '1'){
    		$usuario->activo = '0';
    	}else if($usuario->activo == '0'){
    		$usuario->activo = '1';
    	}
    	$usuario->update();
        return redirect('administrador/usuarios');
    }
    public function create()
    {
        return view("administrador.usuarios.create");
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->get('nombre');
        $user->email = $request->get('correo');
        $user->password = bcrypt(md5($request->get('password')));
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->tipo = $request->get('tipo');
        $user->activo = 1;
        $user->save();

        return Redirect::to('administrador/usuarios');
    }
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return Redirect::to('administrador/usuarios');

    }
}
