@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="padding: 120px 0px">
            <div class="card">
                <div class="card-header">
                    <h4>Editar un tema</h4>
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
                    {!!Form::model($temas,['method'=>'PATCH','route'=>['temas.update',$temas->id]])!!}
                    {{Form::token()}}    
                        <div class="form-group">
                            <label for="tema">Nombre del tema:</label>
                        <input type="text" name="tema" class="form-control" required value="{{$temas->tema}}">
                        </div>
                        <div class="form-group">
                            <label for="tema">Seleccionar categoria:</label>
                            <select name="categoria" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1" 
                                    @if ($temas->categoria=='1') 
                                    selected="selected" 
                                    @endif>Legislación</option>
                                <option value="2"
                                    @if ($temas->categoria=='2') 
                                        selected="selected" 
                                    @endif>Temario específico</option>
                                <option  
                                    @if ($temas->categoria=='3') 
                                        selected="selected" 
                                    @endif value="3">Resto de materias</option>
                            </select>
                        </div>
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