<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Resultados;
use App\Falladas;
use App\Temas;
use App\Comentarios;
use App\ResultadoDiario;
use App\ResultadoMensual;
use Illuminate\Support\Facades\Redirect;
use DB;

class TestController extends Controller
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
            $categorias = DB::table('temas')->groupBy('categoria')->get('categoria');
            $temas = [];
            foreach($categorias as $categoria){
                $consulta = DB::table('temas')->where('categoria','=',$categoria->categoria)->get();
                array_push($temas,$consulta);
            }   
            return view('panel.test.index', ['temas'=>$temas]);
        }
    }
    public function generarTest(Request $request)
    {
        $temas = ($request->get('temas')==null)?[]:$request->get('temas');
        $numero = ($request->get('numPreguntas')==null)?[]:$request->get('numPreguntas');
        $fallasdasInt =  ($request->get('falladas')==null)?0:1;
        $intervalos = [];
        for($i = 0; $i < (count($temas)+ $fallasdasInt);$i++){
            $aux = round((((int)$numero  - array_sum($intervalos))/((count($temas)+ $fallasdasInt)- $i)),0,PHP_ROUND_HALF_UP);
            array_push($intervalos,$aux);
        }
        
        $aux=0;
        $datos = array();
        foreach($temas as $tema){
            $preguntas = DB::table('preguntas')->orderBy(DB::raw('RAND()'))->take((int)$intervalos[$aux])->where('temas_id','=',$tema)->get();
            foreach($preguntas as $pregunta){
                $respuestas =  DB::table('respuestas')->orderBy(DB::raw('RAND()'))->where('preguntas_id','=',$pregunta->id)->get();
                $correcta = DB::table('correctas')->where('preguntas_id','=',$pregunta->id)->get('respuestas_id');
                $comentarios = DB::select('SELECT comentarios.comentario, users.name FROM comentarios, users WHERE users.id = comentarios.users_id AND comentarios.preguntas_id='.$pregunta->id.' ORDER BY comentarios.id ASC');
                array_push($datos,array($pregunta, $respuestas, $correcta[0],$comentarios));
            }
            $aux = $aux + 1;
        }
        
        if(!($request->get('falladas')==null)){
            $preguntasFalladas = DB::table('falladas')->orderBy(DB::raw('RAND()'))->take((int)$intervalos[count($intervalos)-1])->where('users_id','=',Auth::user()->id)->get();
            foreach($preguntasFalladas as $fallada){
                $pregunta = DB::table('preguntas')->where('id','=',$fallada->preguntas_id)->get();
                $respuestas =  DB::table('respuestas')->where('preguntas_id','=',$fallada->preguntas_id)->get();
                $correcta = DB::table('correctas')->where('preguntas_id','=',$fallada->preguntas_id)->get('respuestas_id');
                array_push($datos,array($pregunta[0], $respuestas, $correcta[0]));
            }
        }
        $time = false;
        if($numero==100){
            $time = true;
        }
        return view('panel.test.quiz', ['preguntas'=>$datos, 'cantidad'=> $numero,'time'=>$time, 'temas' => $temas, 'numPreguntas' => $request->get('numPreguntas'), 'falladas' => $request->get('falladas')]);
    }
    public function saveQuestion(Request $request)
    {
        $resultado = DB::table('resultados')->where('temas_id','=',$request->get('tema'))->where('users_id','=',Auth::user()->id)->get();
        if(!(count($resultado)==1)){
            $res = new Resultados;
            $res->users_id = Auth::user()->id;
            $res->temas_id = $request->get('tema');
            $res->correctas = $request->get('correctas');
            $res->incorrectas = $request->get('incorrectas');
            $res->save();
        }else{
            $res= Resultados::findOrFail($resultado[0]->id);
            $res->correctas = (int)$resultado[0]->correctas + (int)$request->get('correctas');
            $res->incorrectas = (int)$resultado[0]->incorrectas + (int)$request->get('incorrectas');
            $res->update();
        }

        $fallada = DB::table('falladas')->where('preguntas_id','=',$request->get('pregunta'))->where('users_id','=',Auth::user()->id)->get();
        
        if(!($request->get('fallo')=='')){
            if(count($fallada)==0){
                $fal = new Falladas;
                $fal->preguntas_id = $request->get('pregunta');
                $fal->users_id = Auth::user()->id;
                $fal->save();

            }
        }else{
            if(count($fallada)==1){
                $fal=Falladas::findOrFail($fallada[0]->id);
                $fal->delete();
            }
        }

        $diario = DB::table('resultado_diario')->where('users_id','=',Auth::user()->id)->get();
        if(count($diario)==0){
            $di = new ResultadoDiario;
            $di->users_id = Auth::user()->id;
            $di->correctas = $request->get('correctas');
            $di->incorrectas = $request->get('incorrectas');
            $di->fecha = date("Y-m-d");
            $di->save();

        }else{
            if($diario[0]->fecha== date("Y-m-d")){
                $di = ResultadoDiario::findOrFail($diario[0]->id);;
                $di->users_id = Auth::user()->id;
                $di->correctas = (int)$diario[0]->correctas + (int)$request->get('correctas');
                $di->incorrectas = (int)$diario[0]->incorrectas + (int)$request->get('incorrectas');
                $di->fecha = $diario[0]->fecha;
                $di->update();
            }else{
                $di = ResultadoDiario::findOrFail($diario[0]->id);;
                $di->users_id = Auth::user()->id;
                $di->correctas = (int)$request->get('correctas');
                $di->incorrectas = (int)$request->get('incorrectas');
                $di->fecha = date("Y-m-d");
                $di->update();
            }
        }
        $mensual = DB::table('resultado_mensual')->where('users_id','=',Auth::user()->id)->get();

        if(count($mensual)==0){
            $me = new ResultadoMensual;
            $me->users_id = Auth::user()->id;
            $me->correctas = $request->get('correctas');
            $me->incorrectas = $request->get('incorrectas');
            $me->mes = date("Y-m");
            $me->save();

        }else{
            if($mensual[0]->mes== date("Y-m")){
                $me = ResultadoMensual::findOrFail($mensual[0]->id);;
                $me->users_id = Auth::user()->id;
                $me->correctas = (int)$mensual[0]->correctas + (int)$request->get('correctas');
                $me->incorrectas = (int)$mensual[0]->incorrectas + (int)$request->get('incorrectas');
                $me->mes = $mensual[0]->mes;
                $me->update();
            }else{
                $me = ResultadoMensual::findOrFail($mensual[0]->id);;
                $me->users_id = Auth::user()->id;
                $me->correctas = (int)$request->get('correctas');
                $me->incorrectas = (int)$request->get('incorrectas');
                $me->mes = date("Y-m");
                $me->update();
            }
        }
    }
     public function comentarioQuestion(Request $request)
    {
        $pregunta_id = $request->get('pregunta_id');
        $comentario = $request->get('comentario');
        $users_id = Auth::user()->id;
        $orden = DB::table('comentarios')->where('preguntas_id','=',$pregunta_id)->max('orden');
        if(!($orden==null)){
            $orden = $orden + 1;
        }else{
            $orden = 1;
        }
        $comen = new Comentarios;
        $comen->preguntas_id = $pregunta_id;
        $comen->users_id = $users_id;
        $comen->comentario = $comentario;
        $comen->orden = $orden;
        $comen->save();

        echo Auth::user()->name;
    }
    
    
}
