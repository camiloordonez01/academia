<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Resultados;
use App\Temas;
use Illuminate\Support\Facades\Redirect;
use DB;

class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request)
    {
        $correctas = DB::table('resultados')->where('users_id','=',Auth::user()->id)->sum('correctas');
        $incorrectas = DB::table('resultados')->where('users_id','=',Auth::user()->id)->sum('incorrectas');

        $temas = DB::table('resultados')->where('users_id','=',Auth::user()->id)->get('temas_id');
        $tortaNombre = [];
        $tortaNumeros = [];

        $totalesTema = [];
        foreach($temas as $tema){
            $sumaCorrecta = DB::table('resultados')->where('temas_id','=',$tema->temas_id)->sum('correctas');
            $sumaIncorrecta = DB::table('resultados')->where('temas_id','=',$tema->temas_id)->sum('incorrectas');

            $nombre = DB::table('temas')->where('id','=',$tema->temas_id)->get('tema');
            array_push($tortaNombre,$nombre[0]->tema);
            array_push($tortaNumeros,((int)$sumaCorrecta + (int)$sumaIncorrecta));
            array_push($totalesTema, [((int)$sumaCorrecta*100)/((int)$sumaCorrecta + (int)$sumaIncorrecta), ((int)$sumaIncorrecta*100)/((int)$sumaCorrecta + (int)$sumaIncorrecta), $tema->temas_id,$nombre[0]->tema,$sumaCorrecta,$sumaIncorrecta]);
        }
        $categorias = DB::table('temas')->groupBy('categoria')->get('categoria');
        $totalCategorias = [];
        foreach($categorias as $categoria){
            $temasCategoria = [];
            foreach($totalesTema as $tema){
                $CatTema = DB::table('temas')->where('id','=',$tema[2])->get('categoria');
                if($CatTema[0]->categoria==$categoria->categoria){
                    array_push($temasCategoria, $tema);
                }
            }
            array_push($totalCategorias,[$categoria->categoria, $temasCategoria]);
        }
        return view('panel.estadisticas',['correctas'=>$correctas,'incorrectas'=>$incorrectas,'tortaNombre'=> json_encode($tortaNombre, JSON_UNESCAPED_UNICODE),'tortaNumeros'=>json_encode($tortaNumeros),'totalCategorias'=>$totalCategorias, 'alumno' => Auth::user()->name]);
    }
    public function resetear(Request $request)
    {
        DB::table('resultados')->truncate();
        DB::table('falladas')->truncate();

        return redirect('control/estadisticas');
    }
    public function chat(Request $request){
        return view('panel.chat');
    }

}
