@extends('layouts.main')
@section('content')
<div class="container pt-5 pb-5">
    <div class="row">
    	
        <div class="col-md-6">
            <h1>Lista de usuarios</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="usuarios/create" class="btn boton-principal">Crear</a>
        </div>
    	<div class="col-md-12">
    		<table class="table table-bordered" id="tablaContacto">
                <thead>
                	<tr>
                		<td class="text-center">Id</td>
                		<td>Nombre</td>
                		<td>Correo</td>
                		<td>Estado</td>
                        <td>Tipo</td>
                		<td>Acciones</td>
                	</tr>
                </thead>
                <tbody>
                	@foreach($usuarios as $usuario)
                	<tr>
                		<td class="text-center">{{$usuario->id}}</td>
                		<td>{{$usuario->name}}</td>
                		<td>{{$usuario->email}}</td>
                		<td>
                			@if($usuario->activo=='1')
                			Activo
                			@else
                			Inactivo
                			@endif
                		</td>
                        <td>
                            @if($usuario->tipo=='1')
                            Administrador
                            @elseif($usuario->tipo=='2')
                            Alumno
                            @endif
                        </td>
                		<td>
                			@if($usuario->activo=='1')
                			<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}" class="btn btn-warning text-white">Desactivar</a>
                			@else
                			<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}" class="btn btn-success">Activar</a>
                			@endif
                			
                            <button data-toggle="modal" data-target="#modal-delete-{{$usuario->id}}" class="btn btn-danger text-white">Eliminar</button>
                        </td>
                        @include('administrador.usuarios.delete')
                    </tr>

                    @endforeach
                </table>
    	</div>
    </div>
</div>
@endsection