<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Preguntas;
use App\Respuestas;
use App\Correctas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PreguntasFormRequest;
use DB;

class PreguntasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function index(Request $request)
    {
        if($request)
        {

            $query=trim($request->get('searchText'));
            $preguntas = DB::select('SELECT preguntas.id, preguntas.pregunta, temas.tema, temas.categoria, preguntas.temas_id FROM preguntas, temas WHERE preguntas.temas_id = temas.id AND preguntas.tipo="1"');
            $datos = [];
            foreach($preguntas as $pregunta){
                $respuestas = DB::table('respuestas')->where('preguntas_id','=',$pregunta->id)->get();
                $correcta = DB::table('correctas')->where('preguntas_id','=',$pregunta->id)->get();
                
                $auxArray = [
                    'pregunta' => $pregunta,
                    'respuestas' => $respuestas,
                    'correcta' => $correcta[0]->respuestas_id
                ];
                array_push($datos,$auxArray);
            }
            //SELECT preguntas.pregunta, respuestas.respuesta, correctas.respuestas_id FROM preguntas, respuestas, correctas WHERE respuestas.preguntas_id=preguntas.id AND correctas.preguntas_id=preguntas.id
            //$preguntas=DB::table('preguntas')->get();

            $categoria1=DB::table('temas')->where('categoria','=','1')->get();
            $categoria2=DB::table('temas')->where('categoria','=','2')->get();
            $categoria3=DB::table('temas')->where('categoria','=','3')->get();
            
            return view('administrador.test.preguntas.index',["preguntas"=>$datos,"searchText"=>$query, "categoria1"=>$categoria1,"categoria2"=>$categoria2,"categoria3"=>$categoria3]);
        }
    }
    public function create()
    {
        $categoria1=DB::table('temas')->where('categoria','=','1')->get();
        $categoria2=DB::table('temas')->where('categoria','=','2')->get();
        $categoria3=DB::table('temas')->where('categoria','=','3')->get();

        return view("administrador.test.preguntas.create",["categoria1"=>$categoria1,"categoria2"=>$categoria2,"categoria3"=>$categoria3]);
    }
    public function store(PreguntasFormRequest $request)
    {
        $pregunta = new Preguntas;
        $pregunta->pregunta =  $request->get('pregunta');
        $pregunta->tipo =  $request->get('tipo');
        $pregunta->temas_id =  $request->get('temas_id');
        $pregunta->save();

        $respuesta1 = new Respuestas;
        $respuesta1->respuesta = $request->get('respuesta_1');
        $respuesta1->preguntas_id = $pregunta->id;
        $respuesta1->save();

        $respuesta2 = new Respuestas;
        $respuesta2->respuesta = $request->get('respuesta_2');
        $respuesta2->preguntas_id = $pregunta->id;
        $respuesta2->save();

        $respuesta3 = new Respuestas;
        $respuesta3->respuesta = $request->get('respuesta_3');
        $respuesta3->preguntas_id = $pregunta->id;
        $respuesta3->save();

        $respuesta4 = new Respuestas;
        $respuesta4->respuesta = $request->get('respuesta_4');
        $respuesta4->preguntas_id = $pregunta->id;
        $respuesta4->save();

        $acertada = $request->get('correcta');
        $correcta = new Correctas;
        $correcta->preguntas_id = $pregunta->id;
        if($acertada=='1'){
            $correcta->respuestas_id = $respuesta1->id;
        }else if($acertada=='2'){
            $correcta->respuestas_id = $respuesta2->id;
        }else if($acertada=='3'){
            $correcta->respuestas_id = $respuesta3->id;
        }else if($acertada=='4'){
            $correcta->respuestas_id = $respuesta4->id;
        }
        $correcta->save();
        
        return Redirect::to('administrador/test/preguntas');
    }
    public function show($id)
    {
        return view("administrador.temas.show",["temas"=>Temas::FindOrFail($id)]);
    }
    public function edit($id)
    {
        $categoria1=DB::table('temas')->where('categoria','=','1')->get();
        $categoria2=DB::table('temas')->where('categoria','=','2')->get();
        $categoria3=DB::table('temas')->where('categoria','=','3')->get();

        $pregunta = DB::table('preguntas')->where('id','=',$id)->get();
        $respuestas = DB::table('respuestas')->where('preguntas_id','=',$id)->get();
        $correcta = DB::table('correctas')->where('preguntas_id','=',$id)->get();
        return view("administrador.test.preguntas.edit",["categoria1"=>$categoria1,"categoria2"=>$categoria2,"categoria3"=>$categoria3,"pregunta"=>$pregunta[0],"respuestas"=>$respuestas,"correcta"=>$correcta[0]]);
    }
    public function update(PreguntasFormRequest $request, $id)
    {
        $pregunta = Preguntas::findOrFail($id);
        $pregunta->pregunta = $request->get('pregunta');
        $pregunta->temas_id = $request->get('temas_id');
        $pregunta->tipo = $request->get('tipo');
        $pregunta->update();

        $respuesta1 = Respuestas::findOrFail($request->get('respuesta1_id'));
        $respuesta1->respuesta = $request->get('respuesta_1');
        $respuesta1->update();

        $respuesta2 = Respuestas::findOrFail($request->get('respuesta2_id'));
        $respuesta2->respuesta = $request->get('respuesta_2');
        $respuesta2->update();

        $respuesta3 = Respuestas::findOrFail($request->get('respuesta3_id'));
        $respuesta3->respuesta = $request->get('respuesta_3');
        $respuesta3->update();

        $respuesta4 = Respuestas::findOrFail($request->get('respuesta4_id'));
        $respuesta4->respuesta = $request->get('respuesta_4');
        $respuesta4->update();

        $correcta = Correctas::findOrFail($request->get('correcta_id'));
        $correcta->respuestas_id = $request->get('correcta');
        $correcta->update();

        return Redirect::to('administrador/test/preguntas');

    }
    public function destroy($id)
    {
        $pregunta=Preguntas::findOrFail($id);
        $pregunta->delete();

        return Redirect::to('administrador/test/preguntas');

    }
    public function load(Request $request){
        $datos = json_decode($request->get('datos'));
        foreach($datos as $dato){
            $pregunta = new Preguntas;
            $pregunta->pregunta =  $dato->pregunta;
            $pregunta->tipo = 1;
            $pregunta->temas_id = DB::table('temas')->where('tema','=',$dato->tema)->get('id')[0]->id;
            $pregunta->save();

            $respuesta1 = new Respuestas;
            $respuesta1->respuesta = $dato->respuesta1;
            $respuesta1->preguntas_id = $pregunta->id;
            $respuesta1->save();

            $respuesta2 = new Respuestas;
            $respuesta2->respuesta = $dato->respuesta2;
            $respuesta2->preguntas_id = $pregunta->id;
            $respuesta2->save();

            $respuesta3 = new Respuestas;
            $respuesta3->respuesta = $dato->respuesta3;
            $respuesta3->preguntas_id = $pregunta->id;
            $respuesta3->save();

            $respuesta4 = new Respuestas;
            $respuesta4->respuesta = $dato->respuesta4;
            $respuesta4->preguntas_id = $pregunta->id;
            $respuesta4->save();

            $acertada = $dato->correcta;
            $correcta = new Correctas;
            $correcta->preguntas_id = $pregunta->id;
            if($acertada=='1'){
                $correcta->respuestas_id = $respuesta1->id;
            }else if($acertada=='2'){
                $correcta->respuestas_id = $respuesta2->id;
            }else if($acertada=='3'){
                $correcta->respuestas_id = $respuesta3->id;
            }else if($acertada=='4'){
                $correcta->respuestas_id = $respuesta4->id;
            }
            $correcta->save();
        }
        
        return Redirect::to('administrador/test/preguntas');
        
    }
}
