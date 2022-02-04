@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto" style="padding: 120px 0px">
            <div class="card">
                <div class="card-header">
                    <h4>Editar un documento</h4>
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
                    {!!Form::model($documento,['method'=>'PATCH','route'=>['documentos.update',$documento->id],'enctype'=>'multipart/form-data'])!!}
                    {{Form::token()}}   
                        <div class="form-group">
                            <label for="nombre">Nombre del documento:</label>
                            <input type="text" name="nombre" class="form-control" value="{{$documento->nombre}}" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Seleccionar tipo:</label>
                            <select name="tipo" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1" 
                                    @if ($documento->tipo==1)
                                    {{'selected'}}
                                    @endif
                                    >Resúmenes</option>
                                <option value="2" 
                                    @if ($documento->tipo==2)
                                    {{'selected'}}
                                    @endif
                                    >Audios</option>
                                <option value="3" 
                                    @if ($documento->tipo==3)
                                    {{'selected'}}
                                    @endif
                                    >Psicotécnicos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Seleccionar categoria:</label>
                            <select name="categoria" class="form-control" required>
                                <option selected disabled>Seleccionar</option>
                                <option value="1" 
                                    @if ($documento->categoria==1)
                                    {{'selected'}}
                                    @endif
                                    >Comunicaciones</option>
                                <option value="2" 
                                    @if ($documento->categoria==2)
                                    {{'selected'}}
                                    @endif
                                    >Constitución</option>
                                <option value="3" 
                                    @if ($documento->categoria==3)
                                    {{'selected'}}
                                    @endif
                                    >Decreto Legislativo 1/2006</option>
                                <option value="4" 
                                    @if ($documento->categoria==4)
                                    {{'selected'}}
                                    @endif
                                    >Espacios Naturales Protegidos</option>
                                <option value="5" 
                                    @if ($documento->categoria==5)
                                    {{'selected'}}
                                    @endif
                                    >Estatuto Básico del Empleado Público</option>
                                <option value="6" 
                                    @if ($documento->categoria==6)
                                    {{'selected'}}
                                    @endif
                                    >Exámenes Oficiales</option>
                                <option value="7" 
                                    @if ($documento->categoria==7)
                                    {{'selected'}}
                                    @endif
                                    >INFOMA</option>
                                <option value="8" 
                                    @if ($documento->categoria==8)
                                    {{'selected'}}
                                    @endif
                                    >Igualdad</option>
                                <option value="9" 
                                    @if ($documento->categoria==9)
                                    {{'selected'}}
                                    @endif
                                    >Incendios forestales</option>
                                <option value="10" 
                                    @if ($documento->categoria==10)
                                    {{'selected'}}
                                    @endif
                                    >Ley de Prevención de Riesgos Laborales</option>
                                <option value="11" 
                                    @if ($documento->categoria==11)
                                    {{'selected'}}
                                    @endif
                                    >Los Servicios de Bomberos</option>
                                <option value="12" 
                                    @if ($documento->categoria==12)
                                    {{'selected'}}
                                    @endif
                                    >Orografía</option>
                                <option value="13" 
                                    @if ($documento->categoria==13)
                                    {{'selected'}}
                                    @endif
                                    >Simulacros oposición 2018-2019 (100 plazas)</option>
                                <option value="14" 
                                    @if ($documento->categoria==14)
                                    {{'selected'}}
                                    @endif
                                    >Simulacros oposición 2019-2020 (150 plazas)</option>
                                <option value="15" 
                                    @if ($documento->categoria==15)
                                    {{'selected'}}
                                    @endif
                                    >Teoría del fuego</option>
                                <option value="16" 
                                    @if ($documento->categoria==16)
                                    {{'selected'}}
                                    @endif
                                    >Carreteras</option>
                                <option value="17" 
                                    @if ($documento->categoria==17)
                                    {{'selected'}}
                                    @endif
                                    >Hidrografía</option>
                                <option value="18" 
                                    @if ($documento->categoria==18)
                                    {{'selected'}}
                                    @endif
                                    >Hojas de respuesta</option>
                                <option value="19" 
                                    @if ($documento->categoria==19)
                                    {{'selected'}}
                                    @endif
                                    >Psicotécnicos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documento">Seleccionar documento:</label>
                            <input type="file" name="documento" class="w-100">
                            <input type="hidden" name="urlDocumento" value="{{$documento->urlDocumento}}">
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