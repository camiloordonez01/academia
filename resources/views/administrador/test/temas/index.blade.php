@extends('layouts.main')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-10 col-xl-10 mx-auto pb-2 text-right">
            <a href="temas/create" class="btn btn-primary boton-principal">Crear</a>
        </div>
        <div class="col-md-10 col-xl-10 mx-auto ">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tablaContacto">
                        <thead>
                            <tr>
                                <td>Tema</td>
                                <td>Categoria</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($temas as $tema)
                            <tr>
                                <td>{{$tema->tema}}</td>
                                <td>
                                    @if ($tema->categoria=='1')
                                    Legislación
                                    @elseif ($tema->categoria=='2')
                                    Temario específico
                                    @elseif ($tema->categoria=='3')
                                    Resto de materias
                                    @endif
                                </td>
                                <td>
                                    <a href="{{URL::action('TemasController@edit',$tema->id)}}" class="btn btn-primary">Editar</a>
                                    <button data-toggle="modal" data-target="#modal-delete-{{$tema->id}}" class="btn btn-danger">Eliminar</button>
                                </td>
                                
                                @include('administrador.test.temas.delete')
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
@endsection