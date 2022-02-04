<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Temas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TemasFormRequest;
use DB;

class TemasController extends Controller
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
            $temas=DB::table('temas')->get();
            return view('administrador.test.temas.index',["temas"=>$temas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.test.temas.create");
    }
    public function store(TemasFormRequest $request)
    {
        $temas = new Temas;
        $temas->tema = $request->get('tema');
        $temas->categoria = $request->get('categoria');
        $temas->save();
        return Redirect::to('administrador/test/temas');
    }
    public function show($id)
    {
        return view("administrador.test.temas.show",["temas"=>Temas::FindOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.test.temas.edit",["temas"=>Temas::FindOrFail($id)]);
    }
    public function update(TemasFormRequest $request, $id)
    {
        $temas=Temas::findOrFail($id);
        $temas->tema=$request->get('tema');
        $temas->categoria=$request->get('categoria');
        $temas->update();

        return Redirect::to('administrador/test/temas');

    }
    public function destroy($id)
    {
        $temas=Temas::findOrFail($id);
        $temas->delete();

        return Redirect::to('administrador/test/temas');

    }
}
