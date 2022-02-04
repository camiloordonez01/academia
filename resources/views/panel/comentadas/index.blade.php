@extends('layouts.main')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container-fluid p-5">
    <div class="row">
    	<div class="col-md-12">
    		<h1>Pregunta comentadas:</h1>
    	</div>
    	<div class="col-md-12">
    		<ul>
    			@foreach($datos as $pregunta)
    			<li>
    				<h5>{{$pregunta[0]->pregunta}}</h5>
    				<ul>
    					@foreach($pregunta[1] as $respuestas)
    					<li 
     						@if($pregunta[2]->respuestas_id == $respuestas->id)
     						class="text-success"
     						@endif
    					>{{$respuestas->respuesta}}</li>
    					@endforeach
    				</ul>
    				<h5 class="mt-5 pl-5" data-toggle="collapse" href="#collapseRes{{$pregunta[0]->id}}" role="button" aria-expanded="false" aria-controls="collapseRes{{$pregunta[0]->id}}" style="cursor: pointer;"><i class="fas fa-chevron-down pr-2"></i>Comentarios y Dudas sobre la pregunta ({{count($pregunta[3])}})</h5>
                        <div class="collapse pl-5" id="collapseRes{{$pregunta[0]->id}}" >
                            
                            
                            @foreach($pregunta[3] as $comentario)
                            <div class="card mb-3">
                                <div class="card-header new-comment">
                                    {{$comentario->name}}
                                </div>
                                <div class="card-body">
                                    {{$comentario->comentario}}
                                </div>
                            </div>
                            @endforeach
                            <div class="card mb-3" id="nuevoComentario{{$pregunta[0]->id}}" style="display: none;">
                            </div>
                            <h5>Comenta: </h5>
                            <div class="card">
                                <div class="card-header new-comment">
                                    <h5 class="mt-1">Nombre</h5>
                                </div>
                                <div class="card-body">
                                    <link href="{{asset('css/quill.snow.css')}}" rel="stylesheet">
                                    

                                    <div id="editorRes{{$pregunta[0]->id}}" class="p-1" style="height: 200px;"></div>

                                    <button class="btn boton-principal mt-3 float-right" id="enviarPregunta{{$pregunta[0]->id}}">Enviar comentario</button>
                                    <script src="{{asset('js/quill.min.js')}}"></script>
                                    <script>
                                        $(document).ready(function(){
                                            var quill = new Quill('#editorRes{{$pregunta[0]->id}}', {
                                                placeholder: 'Escribe aqui',
                                                theme: 'snow'
                                            });
                                            $('#enviarPregunta{{$pregunta[0]->id}}').click(function(){
                                                var comentario = $('#editorRes{{$pregunta[0]->id}} .ql-editor p' ).html();
                                                $.ajax({
                                                    url:'quiz/comentario',
                                                    data:{'comentario' : comentario, 'pregunta_id': {{$pregunta[0]->id}} },
                                                    type:'post',
                                                    success: function (response) {
                                                        $('#editorRes{{$pregunta[0]->id}} .ql-editor p' ).html('');
                                                        $('#nuevoComentario{{$pregunta[0]->id}}').html(
                                                            `<div class="card-header new-comment">
                                                                `+response+`
                                                            </div>
                                                            <div class="card-body">
                                                                `+comentario+`
                                                            </div>`
                                                            );
                                                        $('#nuevoComentario{{$pregunta[0]->id}}').css('display','block');
                                                        console.log('ok');
                                                    },
                                                    error:function(response){
                                                        console.log(response.responseText);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
    			</li>
    			@endforeach
    		</ul>
    	</div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
	});
</script>
@endsection