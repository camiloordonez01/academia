<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comentarios;
use Illuminate\Support\Facades\Redirect;
use DB;

class PreguntasComentadas extends Controller
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
        	$preguntas = DB::table('comentarios')->where('users_id','=', Auth::user()->id)->groupBy('preguntas_id')->get('preguntas_id');
        	
        	$datos = [];
        	foreach($preguntas as $id){
        		$pregunta = DB::table('preguntas')->where('id','=',$id->preguntas_id)->get();

                $respuestas =  DB::table('respuestas')->where('preguntas_id','=',$pregunta[0]->id)->get();
                $correcta = DB::table('correctas')->where('preguntas_id','=',$pregunta[0]->id)->get('respuestas_id');
                $comentarios = DB::select('SELECT comentarios.comentario, users.name FROM comentarios, users WHERE users.id = comentarios.users_id AND comentarios.preguntas_id='.$pregunta[0]->id.' ORDER BY comentarios.id ASC');
                array_push($datos,array($pregunta[0], $respuestas, $correcta[0],$comentarios));
            }
        	return view('panel.comentadas.index', ['datos' => $datos]);
        }
    }
}
