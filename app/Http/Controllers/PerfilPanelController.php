<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use  Illuminate\User;
use  Illuminate\Support\Facades\Redirect;
use DB;

class PerfilPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request)
    {
        if($request)
        {
            return view('panel.perfil.index',["usuario"=>$request->user()]);
        }
    }

    public function resetPassword(Request $request)
    {
        $newPassword = bcrypt(md5($request->get('password1')));

        $user = Auth::user();
        $user->password = $newPassword;
        $user->update();

        return Redirect::to('control/perfil');
    }
}
