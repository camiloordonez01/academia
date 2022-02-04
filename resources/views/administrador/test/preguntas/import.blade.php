@extends('layouts.main')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-12 col-xl-12 mx-auto pb-2 text-right">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Error al cargar<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>
        <div class="col-md-12 col-xl-12">
            <h2 class="text-center">Datos Cargados</h2>
        </div>
        <div class="col-md-12 col-xl-12 mx-auto ">
            <div class="card">
                <div class="card-body">
                    <style>
                        table.dataTable thead .sorting:after,
                        table.dataTable thead .sorting:before,
                        table.dataTable thead .sorting_asc:after,
                        table.dataTable thead .sorting_asc:before,
                        table.dataTable thead .sorting_asc_disabled:after,
                        table.dataTable thead .sorting_asc_disabled:before,
                        table.dataTable thead .sorting_desc:after,
                        table.dataTable thead .sorting_desc:before,
                        table.dataTable thead .sorting_desc_disabled:after,
                        table.dataTable thead .sorting_desc_disabled:before {
                            bottom: .5em;
                        }
                    </style>
                    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                        <thead>
                            <tr>
                                <td width="200" class="th-sm">Pregunta</td>
                                <td class="th-sm">Respuesta 1</td>
                                <td class="th-sm">Respuesta 2</td>
                                <td class="th-sm">Respuesta 3</td>
                                <td class="th-sm">Respuesta 4</td>
                                <td class="th-sm">Correcta</td>
                                <td class="th-sm">Tema</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$empty)
                                @foreach($datos as $dato)
                                <tr>
                                    <td>{{$dato["pregunta"]}}</td>
                                    <td>{{$dato["respuesta1"]}}</td>
                                    <td>{{$dato["respuesta2"]}}</td>
                                    <td>{{$dato["respuesta3"]}}</td>
                                    <td>{{$dato["respuesta4"]}}</td>
                                    <td>{{$dato["correcta"]}}</td>
                                    <td>{{$dato["tema"]}}</td>
                                </tr>
                                @endforeach
                            @else 
                            <h1>No existen datos</h1>
                            @endif
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function () {
                            $('#dtVerticalScrollExample').DataTable({
                                "scrollY": "300px",
                                "scrollCollapse": true,
                            });
                            $('.dataTables_length').addClass('bs-select');
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12 mx-auto ">
            <form method="post" enctype="multipart/form-data" action="{{ url('/administrador/test/preguntas/load') }}" class="text-right">
                {{ csrf_field() }}
                <input type="hidden" name="datos" value="{{json_encode($datos)}}">
                <button type="submit" class="btn boton-principal mt-4">Confirmar creacion</button>
            </form>
        </div>
    </div>
</div>
@endsection