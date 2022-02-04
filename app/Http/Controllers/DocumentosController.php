<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Documentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentosFormRequest;
use DB;

class DocumentosController extends Controller
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
            $documentos=DB::table('documentos')->get();
            return view('administrador.documentos.index',["documentos"=>$documentos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.documentos.create");
    }
    public function store(DocumentosFormRequest $request)
    {
        $urlDocumento = $request->file("documento")->store("public/documentos");
        $documento = new Documentos;
        $documento->nombre = $request->get('nombre');
        $documento->tipo = $request->get('tipo');
        $documento->categoria = $request->get('categoria');
        $documento->urlDocumento = $urlDocumento;
        $documento->save();
        return Redirect::to('administrador/documentos');
    }
    public function show($id)
    {
        return view("administrador.test.temas.show",["temas"=>Temas::FindOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.documentos.edit",["documento"=>Documentos::FindOrFail($id)]);
    }
    public function update(DocumentosFormRequest $request, $id)
    {
        $documento =Documentos::findOrFail($id);
        if(!($request->file("documento")==null)){
            $urlDocumento = $request->file("documento")->store("public/documentos");
            $documento->urlDocumento = $urlDocumento;
        }
        $documento->nombre = $request->get('nombre');
        $documento->tipo = $request->get('tipo');
        $documento->categoria = $request->get('categoria');
        $documento->update();

        return Redirect::to('administrador/documentos');

    }
    public function destroy($id)
    {
        $documento=Documentos::findOrFail($id);
        Storage::delete($documento->urlDocumento);
        $documento->delete();

        return Redirect::to('administrador/documentos');

    }
}
