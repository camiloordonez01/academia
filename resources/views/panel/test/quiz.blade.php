    @extends('layouts.main')
    @section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    @endsection
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        @if($time)
        <div class="col-md-12">
            <h2> 
                <span id="minutes" type="text"></span> :
                <span id="seconds" type="text"></span>
            </h2> 
            <script> 
                //set minutes 
                var mins = 59; 
          
                //calculate the seconds 
                var secs = mins * 60 + 59; 
          
                //countdown function is evoked when page is loaded 
                function countdown() { 
                    setTimeout('Decrement()', 60); 
                } 
          
                //Decrement function decrement the value. 
                function Decrement() { 
                    if (document.getElementById) { 
                        minutes = document.getElementById("minutes"); 
                        seconds = document.getElementById("seconds"); 
          
                        //if less than a minute remaining 
                        //Display only seconds value. 
                        if (seconds < 59) { 
                            seconds.innerHTML = secs; 
                        } 
          
                        //Display both minutes and seconds 
                        //getminutes and getseconds is used to 
                        //get minutes and seconds 
                        else { 
                            minutes.innerHTML = getminutes(); 
                            seconds.innerHTML = getseconds(); 
                        } 
                        //when less than a minute remaining 
                        //colour of the minutes and seconds 
                        //changes to red 
                        if (mins < 1) { 
                            minutes.style.color = "red"; 
                            seconds.style.color = "red"; 
                        } 
                        //if seconds becomes zero, 
                        //then page alert time up 
                        if (mins < 0) { 
                            alert('Tiempo terminado'); 
                            minutes.innerHTML = 0; 
                            seconds.innerHTML = 0; 
                        } 
                        //if seconds > 0 then seconds is decremented 
                        else { 
                            secs--; 
                            setTimeout('Decrement()', 1000); 
                        } 
                    } 
                } 
          
                function getminutes() { 
                    //minutes is seconds divided by 60, rounded down 
                    mins = Math.floor(secs / 60); 
                    return mins; 
                } 
          
                function getseconds() { 
                    //take minutes remaining (as seconds) away  
                    //from total seconds remaining 
                    return secs - Math.round(mins * 60); 
                } 
                countdown();
            </script> 
        </div>
        @endif
        <div class="col-md-6">
            <label for="">
                <span id="contador">1</span>
                / {{$cantidad}}
            </label>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn boton-principal" id="finalizarCorregir">Finalizar y Corregir</button>
        </div>
        <div class="col-md-12">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($preguntas as $pregunta)
                    <div class="swiper-slide">
                        <h5 class="text-center">{{$pregunta[0]->pregunta}}</h5>
                        <div class="answer">
                            <ul>
                                @foreach($pregunta[1] as $respuestas)
                                <li class="respuesta{{$respuestas->id}}" onclick="responder({{$respuestas->id}},{{$pregunta[2]->respuestas_id}},{{$pregunta[0]->id}},{{$pregunta[0]->temas_id}})">{{$respuestas->respuesta}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="hidden" id="respondida{{$pregunta[0]->id}}" value="false">
                        <a href="impugnar/{{$pregunta[0]->id}}"><button class="btn boton-principal2 float-right" style="border-radius: 50%;height: 100px;width: 100px;position: absolute;right: 25px;bottom: 0;">Impugnar pregunta</button></a>
                        <h5 data-toggle="collapse" href="#collapseRes{{$pregunta[0]->id}}" role="button" aria-expanded="false" aria-controls="collapseRes{{$pregunta[0]->id}}" style="cursor: pointer;"><i class="fas fa-chevron-down pr-2"></i>Comentarios y Dudas sobre la pregunta ({{count($pregunta[3])}})</h5>
                        <div class="collapse" id="collapseRes{{$pregunta[0]->id}}" >
                            
                            
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
                    </div>
                    @endforeach
                    <div class="swiper-slide">
                        <h4 class="mb-3 text-center">Estos son tus resultados:</h4>
                        <h5 class="text-success text-center">Acertadas: <span id="acertadas">0</span></h5>
                        <h5 class="text-danger text-center">Falladas: <span id="falladas">0</span></h5>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-12 col-sm-4">
                                <form method="post" action="{{ url('/control/quiz') }}">
                                    {{ csrf_field() }}
                                    @foreach($temas as $tema)
                                    <input type="hidden" name="temas[]" value="{{$tema}}">
                                    @endforeach
                                    <input type="hidden" name="numPreguntas" value="{{$numPreguntas}}">
                                    <input type="hidden" name="falladas" value="{{$falladas}}">
                                    <button type="submit" class="btn boton-principal d-block mx-auto my-2">Nuevo test, mismos temas</button>
                                </form>
                            </div>
                            <div class="col-12 col-sm-4 text-center">
                              <a href="/control/test" class="btn boton-principal mx-auto my-2">Nuevo test</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination" hidden=""></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>

            </div>
        </div>
    </div>
</div>
<script>
    var correctas = 0;
    var incorrectas = 0;

    $(document).ready(function () {
        //initialize swiper when document ready
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        var mySwiper = new Swiper ('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            simulateTouch: false
        });
        $('.swiper-button-next').on('click', function(){
            var contador = $('#contador').html();
            $('#contador').html(parseInt(contador)+1);
        });
        $('.swiper-button-prev').on('click', function(){
            var contador = $('#contador').html();
            $('#contador').html(parseInt(contador)-1);
        });
        $('#finalizarCorregir').on('click', function(){
            mySwiper.slideTo(mySwiper.slides.length);
            $('#contador').html(mySwiper.slides.length);
        });
    });
    function responder(respuesta, correcta, pregunta, tema){
        if($('#respondida'+pregunta).val()=='false'){
            if(respuesta==correcta){
                $('.respuesta'+respuesta).addClass('correcta');
                correctas = correctas + 1;
                $('#acertadas').html(correctas);

                $.ajax({
                    url:'quiz/save',
                    data:{'tema' : tema, 'correctas':1, 'incorrectas':0, 'pregunta':pregunta, 'fallo': ''},
                    type:'post',
                    success: function (response) {
                        console.log(response);
                    },
                    error:function(response){
                        console.log(response.responseText);
                    }
                });

            }else{
                $('.respuesta'+respuesta).addClass('incorrecta');
                $('.respuesta'+correcta).addClass('correcta');
                incorrectas = incorrectas + 1;
                $('#falladas').html(incorrectas);
                $.ajax({
                    url:'quiz/save',
                    data:{'tema' : tema, 'correctas':0, 'incorrectas':1, 'pregunta':pregunta, 'fallo': 'true'},
                    type:'post',
                    success: function (response) {
                        console.log(response);
                    },
                    error:function(response){
                        console.log(response.responseText);
                    }
                });

            }
            $('#respondida'+pregunta).val('true');
        }
    }
</script>
@endsection