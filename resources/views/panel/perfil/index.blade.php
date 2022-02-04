@extends('layouts.main')
@section('content')
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-6">
            <h3 class="border-bottom pb-1 font-weight-bold">Tu datos personales</h3>
            <div class="border-bottom pt-4" style="display: flow-root;">
                <h5 class="float-left ">Nombre</h5>
                <span class="float-right text-monospace">{{$usuario->name}}</span>
            </div>
            <div class="border-bottom pt-4" style="display: flow-root;">
                <h5 class="float-left " style="display: flow-root;">Email</h5>
                <span class="float-right text-monospace">{{$usuario->email}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card pt-4">
                <div class="card-body text-center">
                    <h4 class="">Cambiar Contraseña</h4>
                    <form method="post" name="formulario" enctype="multipart/form-data" action="{{ url('/control/perfil/resetPassword') }}" class="text-right">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="password" name="password1" placeholder="nueva contraseña" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" placeholder="confirmar nueva contraseña" class="form-control">
                        </div>
                        <div class="alert alert-warning text-center" role="alert">
							El minimo de la contraseña es de 8 caracteres.
						</div>
                        <div class="form-group">
                            <input type="button" onClick="comprobar()" class="boton-principal btn btn-primary btn-lg btn-block my-4 " value="Cambiar Contraseña">
                        </div>
                        <div class="form-group" >
                            <div class="alert alert-danger text-left" style="display: none;" id="minimoInvalido">
								El minimo de la contraseña es de 8 caracteres.
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function comprobar(){
        clave1 = document.formulario.password1.value;
        clave2 = document.formulario.password2.value;
        if(clave1.length>= 8){
            if(clave1===clave2){
                $('#minimoInvalido').css('display','none');
                document.formulario.submit()
            }else{
                $('#minimoInvalido').html('Las dos contraseñas deben ser iguales.');
                $('#minimoInvalido').css('display','block');
            }
        }else{
            console.log('entro');
            $('#minimoInvalido').html('El minimo de la contraseña es de 8 caracteres.');
            $('#minimoInvalido').css('display','block');
        }
    }
</script>
@endsection