<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Documentos;
use Illuminate\Support\Facades\Redirect;
use DB;

class DocumentosViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request)
    {
        //Tipo 1
        $tipoUno1 = DB::table('documentos')->where('categoria','=','1')->where('tipo','=','1')->get();
        $tipoUno2 = DB::table('documentos')->where('categoria','=','2')->where('tipo','=','1')->get();
        $tipoUno3 = DB::table('documentos')->where('categoria','=','3')->where('tipo','=','1')->get();
        $tipoUno4 = DB::table('documentos')->where('categoria','=','4')->where('tipo','=','1')->get();
        $tipoUno5 = DB::table('documentos')->where('categoria','=','5')->where('tipo','=','1')->get();
        $tipoUno6 = DB::table('documentos')->where('categoria','=','6')->where('tipo','=','1')->get();
        $tipoUno7 = DB::table('documentos')->where('categoria','=','7')->where('tipo','=','1')->get();
        $tipoUno8 = DB::table('documentos')->where('categoria','=','8')->where('tipo','=','1')->get();
        $tipoUno9 = DB::table('documentos')->where('categoria','=','9')->where('tipo','=','1')->get();
        $tipoUno10 = DB::table('documentos')->where('categoria','=','10')->where('tipo','=','1')->get();
        $tipoUno11 = DB::table('documentos')->where('categoria','=','11')->where('tipo','=','1')->get();
        $tipoUno12 = DB::table('documentos')->where('categoria','=','12')->where('tipo','=','1')->get();
        $tipoUno13 = DB::table('documentos')->where('categoria','=','13')->where('tipo','=','1')->get();
        $tipoUno14 = DB::table('documentos')->where('categoria','=','14')->where('tipo','=','1')->get();
        $tipoUno15 = DB::table('documentos')->where('categoria','=','15')->where('tipo','=','1')->get();
        $tipoUno16 = DB::table('documentos')->where('categoria','=','16')->where('tipo','=','1')->get();
        $tipoUno17 = DB::table('documentos')->where('categoria','=','17')->where('tipo','=','1')->get();
        $tipoUno18 = DB::table('documentos')->where('categoria','=','18')->where('tipo','=','1')->get();
        $tipoUno19 = DB::table('documentos')->where('categoria','=','19')->where('tipo','=','1')->get();

        $tipo1 = [$tipoUno1,$tipoUno2,$tipoUno3,$tipoUno4,$tipoUno5,$tipoUno6,$tipoUno7,$tipoUno8,$tipoUno9,$tipoUno10,$tipoUno11,$tipoUno12,$tipoUno13,$tipoUno14,$tipoUno15,$tipoUno16,$tipoUno17,$tipoUno18,$tipoUno19];

        //Tipo 2
        $tipoDos1 = DB::table('documentos')->where('categoria','=','1')->where('tipo','=','2')->get();
        $tipoDos2 = DB::table('documentos')->where('categoria','=','2')->where('tipo','=','2')->get();
        $tipoDos3 = DB::table('documentos')->where('categoria','=','3')->where('tipo','=','2')->get();
        $tipoDos4 = DB::table('documentos')->where('categoria','=','4')->where('tipo','=','2')->get();
        $tipoDos5 = DB::table('documentos')->where('categoria','=','5')->where('tipo','=','2')->get();
        $tipoDos6 = DB::table('documentos')->where('categoria','=','6')->where('tipo','=','2')->get();
        $tipoDos7 = DB::table('documentos')->where('categoria','=','7')->where('tipo','=','2')->get();
        $tipoDos8 = DB::table('documentos')->where('categoria','=','8')->where('tipo','=','2')->get();
        $tipoDos9 = DB::table('documentos')->where('categoria','=','9')->where('tipo','=','2')->get();
        $tipoDos10 = DB::table('documentos')->where('categoria','=','10')->where('tipo','=','2')->get();
        $tipoDos11 = DB::table('documentos')->where('categoria','=','11')->where('tipo','=','2')->get();
        $tipoDos12 = DB::table('documentos')->where('categoria','=','12')->where('tipo','=','2')->get();
        $tipoDos13 = DB::table('documentos')->where('categoria','=','13')->where('tipo','=','2')->get();
        $tipoDos14 = DB::table('documentos')->where('categoria','=','14')->where('tipo','=','2')->get();
        $tipoDos15 = DB::table('documentos')->where('categoria','=','15')->where('tipo','=','2')->get();
        $tipoDos16 = DB::table('documentos')->where('categoria','=','16')->where('tipo','=','2')->get();
        $tipoDos17 = DB::table('documentos')->where('categoria','=','17')->where('tipo','=','2')->get();
        $tipoDos18 = DB::table('documentos')->where('categoria','=','18')->where('tipo','=','2')->get();
        $tipoDos19 = DB::table('documentos')->where('categoria','=','19')->where('tipo','=','2')->get();
        $tipo2 = [$tipoDos1,$tipoDos2,$tipoDos3,$tipoDos4,$tipoDos5,$tipoDos6,$tipoDos7,$tipoDos8,$tipoDos9,$tipoDos10,$tipoDos11,$tipoDos12,$tipoDos13,$tipoDos14,$tipoDos15,$tipoDos16,$tipoDos17,$tipoDos18,$tipoDos19];
        

        //Tipo 3
        $tipoTres1 = DB::table('documentos')->where('categoria','=','1')->where('tipo','=','3')->get();
        $tipoTres2 = DB::table('documentos')->where('categoria','=','2')->where('tipo','=','3')->get();
        $tipoTres3 = DB::table('documentos')->where('categoria','=','3')->where('tipo','=','3')->get();
        $tipoTres4 = DB::table('documentos')->where('categoria','=','4')->where('tipo','=','3')->get();
        $tipoTres5 = DB::table('documentos')->where('categoria','=','5')->where('tipo','=','3')->get();
        $tipoTres6 = DB::table('documentos')->where('categoria','=','6')->where('tipo','=','3')->get();
        $tipoTres7 = DB::table('documentos')->where('categoria','=','7')->where('tipo','=','3')->get();
        $tipoTres8 = DB::table('documentos')->where('categoria','=','8')->where('tipo','=','3')->get();
        $tipoTres9 = DB::table('documentos')->where('categoria','=','9')->where('tipo','=','3')->get();
        $tipoTres10 = DB::table('documentos')->where('categoria','=','10')->where('tipo','=','3')->get();
        $tipoTres11 = DB::table('documentos')->where('categoria','=','11')->where('tipo','=','3')->get();
        $tipoTres12 = DB::table('documentos')->where('categoria','=','12')->where('tipo','=','3')->get();
        $tipoTres13 = DB::table('documentos')->where('categoria','=','13')->where('tipo','=','3')->get();
        $tipoTres14 = DB::table('documentos')->where('categoria','=','14')->where('tipo','=','3')->get();
        $tipoTres15 = DB::table('documentos')->where('categoria','=','15')->where('tipo','=','3')->get();
        $tipoTres16 = DB::table('documentos')->where('categoria','=','16')->where('tipo','=','3')->get();
        $tipoTres17 = DB::table('documentos')->where('categoria','=','17')->where('tipo','=','3')->get();
        $tipoTres18 = DB::table('documentos')->where('categoria','=','18')->where('tipo','=','3')->get();
        $tipoTres19 = DB::table('documentos')->where('categoria','=','19')->where('tipo','=','3')->get();
        $tipo3 = [$tipoTres1,$tipoTres2,$tipoTres3,$tipoTres4,$tipoTres5,$tipoTres6,$tipoTres7,$tipoTres8,$tipoTres9,$tipoTres10,$tipoTres11,$tipoTres12,$tipoTres13,$tipoTres14,$tipoTres15,$tipoTres16,$tipoTres17,$tipoTres18,$tipoTres19];
        
        return view('panel.documentos.index',['datos'=> [$tipo1, $tipo2, $tipo3]]);
    }
}
