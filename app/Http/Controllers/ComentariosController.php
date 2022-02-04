<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comentarios;
use Illuminate\Support\Facades\Redirect;
use DB;

class ComentariosController extends Controller
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
        	$preguntas = DB::table('preguntas')->get();
        	
        	$datos = [];
        	foreach($preguntas as $pregunta){

                $respuestas =  DB::table('respuestas')->where('preguntas_id','=',$pregunta->id)->get();
                $correcta = DB::table('correctas')->where('preguntas_id','=',$pregunta->id)->get('respuestas_id');
                $comentarios = DB::select('SELECT comentarios.comentario, users.name FROM comentarios, users WHERE users.id = comentarios.users_id AND comentarios.preguntas_id='.$pregunta->id.' ORDER BY comentarios.id ASC');
                array_push($datos,array($pregunta, $respuestas, $correcta[0],$comentarios));
            }
        	return view('administrador.comentarios.index', ['datos' => $datos]);
        }
    }
}

