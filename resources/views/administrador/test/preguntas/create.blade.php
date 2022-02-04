@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="padding: 120px 0px">
            <div class="card">
                <div class="card-header">
                    <h4>Crear una pregunta</h4>
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
                    {!!Form::open(array('url'=> 'administrador/test/preguntas','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}    
                        <div class="form-group">
                            <label for="temas_id">Seleccionar tema:</label>
                            <select name="temas_id" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <optgroup label="Legislación">
                                    @foreach ($categoria1 as $tema)
                                    <option value="{{$tema->id}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Temario específico">
                                    @foreach ($categoria2 as $tema)
                                    <option value="{{$tema->id}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Resto de materias">
                                    @foreach ($categoria3 as $tema)
                                    <option value="{{$tema->id}}">{{$tema->tema}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pregunta">Pregunta:</label>
                            <textarea type="text" name="pregunta" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_1">Respuesta 1:</label>
                            <textarea type="text" name="respuesta_1" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_2">Respuesta 2:</label>
                            <textarea type="text" name="respuesta_2" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_3">Respuesta 3:</label>
                            <textarea type="text" name="respuesta_3" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_4">Respuesta 4:</label>
                            <textarea type="text" name="respuesta_4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="correcta">Seleccionar respuesta correcta:</label>
                            <select name="correcta" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <input type="hidden" name="tipo" value="1">
                        <div class="form-group">
                            <button class="btn btn-primary boton-principal form-control">Crear</button>
                        </div>
                        <div class="form-group">
                            <p>Nota de desarrollo:</p>
                            <p>  *Las respuestas no representan orden, solo son informativas y en el momento de mostrar al cliente se van a hacer aleatoriamente</p>
                            <p>  *Se hace la sugerencia de dar la posibilidad de crear mas de 4 respuestas incorrectas y una solo correcta; en el momento de mostrar al cliente se elijira 3 respuestas incorrectas aleatorias y la correcta, asi aumentaria el nivel de dificultad</p>
                        </div>
                   {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection