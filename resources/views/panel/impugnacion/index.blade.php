@extends('layouts.main')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
    	<div class="col-md-6 mx-auto">
    		<div class="card">
    			<div class="card-body">
    				<form method="POST" action="{{ url('/control/impugnar') }}">
                		{{ csrf_field() }}
	    				<h2 class="text-center">Impugnar Pregunta</h2>
	    				<ul style="border: 1px solid black; border-radius: 5px;list-style:none; padding: 0;">
	    					<li style="border-bottom: 1px solid black;text-align: center; padding: 10px 20px;">
	    						<h5>Pregunta:</h5>
	    						<p>{{$pregunta->pregunta}}</p>
	    						<input type="hidden" name="pregunta" value="{{$pregunta->pregunta}}">
	    					</li>
	    					<li style="border-bottom: 1px solid black;text-align: center;padding: 10px 20px;">
	    						<h5>Respuesta A:</h5>
	    						<p>{{$respuestas[0]->respuesta}}</p>
	    						<input type="hidden" name="respuesta[]" value="{{$respuestas[0]->respuesta}}">
	    					</li>
	    					<li style="border-bottom: 1px solid black;text-align: center;padding: 10px 20px;">
	    						<h5>Respuesta B:</h5>
	    						<p>{{$respuestas[1]->respuesta}}</p>
	    						<input type="hidden" name="respuesta[]" value="{{$respuestas[1]->respuesta}}">
	    					</li>
	    					<li style="border-bottom: 1px solid black;text-align: center;padding: 10px 20px;">
	    						<h5>Respuesta C:</h5>
	    						<p>{{$respuestas[2]->respuesta}}</p>
	    						<input type="hidden" name="respuesta[]" value="{{$respuestas[2]->respuesta}}">
	    					</li>
	    					<li style="border-bottom: 1px solid black;text-align: center;padding: 10px 20px;">
	    						<h5>Respuesta D:</h5>
	    						<p>{{$respuestas[3]->respuesta}}</p>
	    						<input type="hidden" name="respuesta[]" value="{{$respuestas[3]->respuesta}}">
	    					</li>
	    					<li style="padding: 10px 20px; text-align: center;">
	    						<h5>La respuesta correcta es
	    							@if($correcta->respuestas_id==$respuestas[0]->id)
	    							A
	    							<input type="hidden" name="correcta" value="A">
	    							@elseif($correcta->respuestas_id==$respuestas[1]->id)
	    							B
	    							<input type="hidden" name="correcta" value="B">
	    							@elseif($correcta->respuestas_id==$respuestas[2]->id)
	    							C
	    							<input type="hidden" name="correcta" value="C">
	    							@elseif($correcta->respuestas_id==$respuestas[3]->id)
	    							D
	    							<input type="hidden" name="correcta" value="D">
	    							@endif
	    						</h5>

	    					</li>
	    				</ul>
	    				<h5>Justificacion:</h5>
	    				<textarea style="height: 200px;margin-bottom: 20px;" class="form-control" placeholder="Escribe" name="justificacion"></textarea>
	    				<button class="btn boton-principal form-control">Enviar</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection