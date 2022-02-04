<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\ResultadoDiario;
use Illuminate\Support\Facades\Redirect;
use DB;

class RankingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request)
    {
    	$diario = DB::table('resultado_diario')->where('fecha', '=', date('Y-m-d'))->get();
    	$datosdiarios = [];
    	foreach ($diario as $dato) {
    		$puntos = (int)$dato->correctas*3 - (int)$dato->incorrectas;
    		array_push($datosdiarios,['users_id' => $dato->users_id,'correctas' => $dato->correctas,'incorrectas' => $dato->incorrectas,'puntos' =>$puntos]);
    	}
		// a partir de PHP 5.5.0 puede usar array_column() en lugar del código anterior
		$puntos = array_column($datosdiarios, 'puntos');

		// Ordenar los datos con volumen descendiente, edición ascendiente
		// Agregar $datos como el último parámetro, para ordenar por la clave común
		array_multisort($puntos, SORT_DESC, $datosdiarios);

		$mensual = DB::table('resultado_mensual')->where('mes', '=', date('Y-m'))->get();
    	$datosmensuales = [];
    	foreach ($mensual as $dato) {
    		$puntos = (int)$dato->correctas*3 - (int)$dato->incorrectas;
    		array_push($datosmensuales,['users_id' => $dato->users_id,'correctas' => $dato->correctas,'incorrectas' => $dato->incorrectas,'puntos' =>$puntos]);
    	}
		// a partir de PHP 5.5.0 puede usar array_column() en lugar del código anterior
		$puntos = array_column($datosmensuales, 'puntos');

		// Ordenar los datos con volumen descendiente, edición ascendiente
		// Agregar $datos como el último parámetro, para ordenar por la clave común
		array_multisort($puntos, SORT_DESC, $datosmensuales);
    	return view('panel.ranking.index', ['datosdiarios' => array_slice($datosdiarios, 0, 10),'datosmensuales'=>$datosmensuales, 'idUser'=>Auth::user()->id]);
  
    }
}
