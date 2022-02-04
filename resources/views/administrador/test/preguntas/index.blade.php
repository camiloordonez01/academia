@extends('layouts.main')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-md-12 col-xl-12 mx-auto pb-2 text-right">
            <button class="btn btn-primary boton-principal" data-toggle="modal" data-target="#importar">Importar</button>
            <a href="preguntas/create" class="btn btn-primary boton-principal">Crear</a>
        </div>
        <div class="col-md-12 col-xl-12 mx-auto ">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tablaContacto">
                        <thead>
                            <tr>
                                <td>Tema</td>
                                <td width="200">Pregunta</td>
                                <td>Respuesta 1</td>
                                <td>Respuesta 2</td>
                                <td>Respuesta 3</td>
                                <td>Respuesta 4</td>
                                <td>Correcta</td>
                                <td width="200">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($preguntas as $dato)
                            <tr>
                                <td>{{$dato['pregunta']->tema}}</td>
                                <td>{{$dato['pregunta']->pregunta}}</td>
                                @foreach ($dato['respuestas'] as $respuesta)
                                <td>{{$respuesta->respuesta}}</td>
                                @endforeach
                                @for ($i=0;$i < count($dato['respuestas']);$i++)
                                    @if ($dato['respuestas'][$i]->id==$dato['correcta'])
                                    <td>{{$i+1}}</td>
                                    @endif
                                @endfor
                                <td>
                                    <a href="{{URL::action('PreguntasController@edit',$dato['pregunta']->id)}}" class="btn btn-primary">Editar</a>
                                    <button data-toggle="modal" data-target="#modal-delete-{{$dato['pregunta']->id}}" class="btn btn-danger">Eliminar</button>
                                </td>
                                @include('administrador.test.preguntas.delete')
                            </tr>
                            @empty
                            <h1>No existen temas</h1>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cargar Datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="{{ url('/administrador/test/import') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <select name="tema" class="form-control" required style="margin-bottom: 20px;">
                                <option selected disabled>Seleccionar tema:</option>
                                <optgroup label="Legislación">
                                    @foreach ($categoria1 as $tema)
                                    <option value="{{$tema->tema}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Temario específico">
                                    @foreach ($categoria2 as $tema)
                                    <option value="{{$tema->tema}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Resto de materias">
                                    @foreach ($categoria3 as $tema)
                                    <option value="{{$tema->tema}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                    </select>
                    <input type="file" name="select_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                    <span class="text-muted">.xls, .xslx</span>
                    <input type="submit" name="upload" class="btn btn-primary form-control mt-3 boton-principal" value="Upload">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection