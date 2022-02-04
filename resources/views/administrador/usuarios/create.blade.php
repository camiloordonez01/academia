@extends('layouts.main')
@section('content')
<div class="container p-5">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card">
                <div class="card-header">
                    <h4>Crear un usuario</h4>
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
                    {!!Form::open(array('url'=> 'administrador/usuarios','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="form-group text-center">
                        <label>Elige tipo:</label></br>
                        <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipo" id="admin" value="1">
						  <label class="form-check-label" for="admin">Administrador</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="tipo" id="alumno" value="2">
						  <label class="form-check-label" for="alumno">Alumno</label>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre y apellidos:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" name="correo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
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