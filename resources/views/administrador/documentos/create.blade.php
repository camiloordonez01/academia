@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="padding: 120px 0px">
            <div class="card">
                <div class="card-header">
                    <h4>Crear un documento</h4>
                </div>
                <div class="card-body">
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $mensaje)
                                <li>{{$mensaje}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {!!Form::open(array('url'=> 'administrador/documentos','method'=>'POST','autocomplete'=>'off', 'enctype'=>'multipart/form-data'))!!}
                    {{Form::token()}}    
                        <div class="form-group">
                            <label for="nombre">Nombre del documento:</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Seleccionar tipo:</label>
                            <select name="tipo" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1">Resúmenes</option>
                                <option value="2">Audios</option>
                                <option value="3">Psicotécnicos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Seleccionar categoria:</label>
                            <select name="categoria" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1">Comunicaciones</option>
                                <option value="2">Constitución</option>
                                <option value="3">Decreto Legislativo 1/2006</option>
                                <option value="4">Espacios Naturales Protegidos</option>
                                <option value="5">Estatuto Básico del Empleado Público</option>
                                <option value="6">Exámenes Oficiales</option>
                                <option value="7">INFOMA</option>
                                <option value="8">Igualdad</option>
                                <option value="9">Incendios forestales</option>
                                <option value="10">Ley de Prevención de Riesgos Laborales</option>
                                <option value="11">Los Servicios de Bomberos</option>
                                <option value="12">Orografía</option>
                                <option value="13">Simulacros oposición 2018-2019 (100 plazas)</option>
                                <option value="14">Simulacros oposición 2019-2020 (150 plazas)</option>
                                <option value="15">Teoría del fuego</option>
                                <option value="16">Carreteras</option>
                                <option value="17">Hidrografía</option>
                                <option value="18">Hojas de respuesta</option>
                                <option value="19">Psicotécnicos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documento">Seleccionar documento:</label>
                            <input type="file" name="documento" class="w-100" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary boton-principal form-control">Crear</button>
                        </div>
                   {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection