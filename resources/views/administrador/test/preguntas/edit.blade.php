@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="padding: 120px 0px">
            <div class="card">
                <div class="card-header">
                    <h4>Editar una pregunta</h4>
                </div>
                <div class="card-body">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {!!Form::model($pregunta,['method'=>'PATCH','route'=>['preguntas.update',$pregunta->id]])!!}
                    {{Form::token()}}
                        <input type="hidden" name="respuesta1_id" value="{{$respuestas[0]->id}}">
                        <input type="hidden" name="respuesta2_id" value="{{$respuestas[1]->id}}">
                        <input type="hidden" name="respuesta3_id" value="{{$respuestas[2]->id}}">
                        <input type="hidden" name="respuesta4_id" value="{{$respuestas[3]->id}}">
                        <input type="hidden" name="correcta_id" value="{{$correcta->id}}">    
                        <div class="form-group">
                            <label for="temas_id">Seleccionar tema:</label>
                            <select name="temas_id" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <optgroup label="Legislación">
                                    @foreach ($categoria1 as $tema)
                                    <option value="{{$tema->id}}" 
                                        @if ($pregunta->temas_id==$tema->id)
                                        {{'selected'}}
                                        @endif
                                        >{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Temario específico">
                                    @foreach ($categoria2 as $tema)
                                    <option value="{{$tema->id}}"
                                        @if ($pregunta->temas_id==$tema->id)
                                        {{'selected'}}
                                        @endif
                                        >{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Resto de materias">
                                    @foreach ($categoria3 as $tema)
                                    <option value="{{$tema->id}}" 
                                        @if ($pregunta->temas_id==$tema->id)
                                        {{'selected'}}
                                        @endif
                                        >{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pregunta">Pregunta:</label>
                            <textarea type="text" name="pregunta" class="form-control" required >{{$pregunta->pregunta}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_1">Respuesta 1:</label>
                            <textarea type="text" name="respuesta_1" class="form-control" required>{{$respuestas[0]->respuesta}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_2">Respuesta 2:</label>
                            <textarea type="text" name="respuesta_2" class="form-control" required >{{$respuestas[1]->respuesta}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_3">Respuesta 3:</label>
                            <textarea type="text" name="respuesta_3" class="form-control" required >{{$respuestas[2]->respuesta}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_4">Respuesta 4:</label>
                            <textarea type="text" name="respuesta_4" class="form-control" required >{{$respuestas[3]->respuesta}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="correcta">Seleccionar respuesta correcta:</label>
                            <select name="correcta" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1"
                                @if ($correcta->respuestas_id==$respuestas[0]->id)
                                {{'selected'}}
                                @endif
                                >1</option>
                                <option value="2"
                                @if ($correcta->respuestas_id==$respuestas[1]->id)
                                {{'selected'}}
                                @endif
                                >2</option>
                                <option value="3"
                                @if ($correcta->respuestas_id==$respuestas[2]->id)
                                {{'selected'}}
                                @endif
                                >3</option>
                                <option value="4"
                                @if ($correcta->respuestas_id==$respuestas[3]->id)
                                {{'selected'}}
                                @endif
                                >4</option>
                            </select>
                        </div>
                        <input type="hidden" name="tipo" value="1">
                        <div class="form-group">
                            <button class="btn btn-primary boton-principal form-control">Editar</button>
                        </div>
                   {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection