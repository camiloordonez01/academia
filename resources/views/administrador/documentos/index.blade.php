@extends('layouts.main')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-10 col-xl-10 mx-auto pb-2 text-right">
            <a href="documentos/create" class="btn btn-primary boton-principal">Crear</a>
        </div>
        <div class="col-md-10 col-xl-10 mx-auto ">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tablaContacto">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Tipo</td>
                                <td>Categoria</td>
                                <td>Documento</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documentos as $documento)
                            <tr>
                                <td>{{$documento->nombre}}</td>
                                <td>
                                    @if ($documento->tipo=='1')
                                    Resúmenes
                                    @elseif ($documento->tipo=='2')
                                    Audios
                                    @elseif ($documento->tipo=='3')
                                    Psicotécnicos
                                    @endif
                                </td>
                                <td>
                                    @if ($documento->categoria=='1')
                                    Comunicaciones
                                    @elseif ($documento->categoria=='2')
                                    Constitución
                                    @elseif ($documento->categoria=='3')
                                    Decreto Legislativo 1/2006
                                    @elseif ($documento->categoria=='4')
                                    Espacios Naturales Protegidos
                                    @elseif ($documento->categoria=='5')
                                    Estatuto Básico del Empleado Público
                                    @elseif ($documento->categoria=='6')
                                    Exámenes Oficiales
                                    @elseif ($documento->categoria=='7')
                                    INFOMA
                                    @elseif ($documento->categoria=='8')
                                    Igualdad
                                    @elseif ($documento->categoria=='9')
                                    Incendios forestales
                                    @elseif ($documento->categoria=='10')
                                    Ley de Prevención de Riesgos Laborales
                                    @elseif ($documento->categoria=='11')
                                    Los Servicios de Bomberos
                                    @elseif ($documento->categoria=='12')
                                    Orografía
                                    @elseif ($documento->categoria=='13')
                                    Simulacros oposición 2018-2019 (100 plazas)
                                    @elseif ($documento->categoria=='14')
                                    Simulacros oposición 2019-2020 (150 plazas)
                                    @elseif ($documento->categoria=='15')
                                    Teoría del fuego
                                    @elseif ($documento->categoria=='16')
                                    Carreteras
                                    @elseif ($documento->categoria=='17')
                                    Hidrografía
                                    @elseif ($documento->categoria=='18')
                                    Hojas de respuesta
                                    @elseif ($documento->categoria=='19')
                                    Psicotécnicos
                                    @endif
                                </td>
                                <td><a href="{{Storage::url($documento->urlDocumento)}}">Ver</a></td>
                                <td>
                                    <a href="{{URL::action('DocumentosController@edit',$documento->id)}}" class="btn btn-primary">Editar</a>
                                    <button data-toggle="modal" data-target="#modal-delete-{{$documento->id}}" class="btn btn-danger">Eliminar</button>
                                </td>
                                @include('administrador.documentos.delete')
                            </tr>
                            @empty
                            <h1>No existen documentos</h1>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection