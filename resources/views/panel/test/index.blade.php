@extends('layouts.main')
@section('content')
@if(app('request')->input('enviado')=='true')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    Swal.fire({
      icon: 'success',
      title: 'Impugnacion creada correctamente',
      showConfirmButton: false,
      timer: 2000
    });
</script>
@endif
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h1>Generador de test</h1>
        </div>
        <div class="col-md-12">
            <h4>Temas disponibles</h4>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ url('/control/quiz') }}">
                {{ csrf_field() }}
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($temas as $tema)
                            <div class="col-md-4 pb-4">
                                <ul class="listaTemas">
                                    <li class="active">
                                        <input type="checkbox" name="" id="" onclick="seleccionarTemas({{$loop->iteration}}, this)">
                                        <label for="">
                                            @if($loop->iteration == 1)
                                            Legislación
                                            @elseif($loop->iteration == 2)
                                            Temario específico
                                            @elseif($loop->iteration == 3)
                                            Resto de materias
                                            @endif
                                        </label>
                                    </li>
                                    @foreach ($tema as $item)
                                        <li>
                                            <input type="checkbox" class="itemTema{{$item->categoria}}" name="temas[]" value="{{$item->id}}">
                                            <label for="">{{$item->tema}}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        <div class="col-md-4 pb-4">
                            <ul class="listaTemas">
                                <li class="active">
                                    <input type="checkbox" name="falladas" id="falladas" value="true">
                                    <label for="falladas">Falladas</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 pb-4">
                            <h4>Numero de preguntas</h4>
                            <div class="float-left pr-3">
                                <input type="radio" name="numPreguntas" value="15" checked>
                                <label for="">15</label>
                            </div>
                            <div class="float-left pr-3">
                                <input type="radio" name="numPreguntas" value="20">
                                <label for="">20</label>
                            </div>
                            <div class="float-left pr-3">
                                <input type="radio" name="numPreguntas" value="30">
                                <label for="">30</label>
                            </div>
                            <div class="float-left pr-3">
                                <input type="radio" onclick="selectAll2()" name="numPreguntas" value="100">
                                <label for="">Modo Examen</label>
                            </div>
                        </div>
                        <div class="col-md-12 pb-4">
                            <button type="button" class="btn boton-principal float-left mr-3" onclick="selectAll()">Seleccionar todas</button>
                            <button type="button" class="btn boton-principal float-left" onclick="limpiar()">Reestablecer</button>
                            <button type="submit" class="btn boton-principal float-right">Generar Test</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function seleccionarTemas(item, elemento){
        if($(elemento).prop('checked')){
            $('.itemTema'+item).prop( "checked", true );
        }else{
            $('.itemTema'+item).prop( "checked", false );
        }
        
    }
    function selectAll(){
        $('input:checkbox').prop( "checked", true );
    }
    function selectAll2(){
        $('input:checkbox').prop( "checked", true );
        $('#falladas').prop( "checked", false );

    }
    function limpiar(){
        $('input:checkbox').prop( "checked", false );
    }
</script>
@endsection