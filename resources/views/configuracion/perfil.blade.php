@extends('layouts.main')
@section('content')
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-6">
            <h3 class="border-bottom pb-1 font-weight-bold">Tu datos personales</h3>
            <div class="border-bottom pt-4" style="display: flow-root;">
                <h5 class="float-left ">Nombre</h5>
                <span class="float-right text-monospace">Pepito Perez</span>
            </div>
            <div class="border-bottom pt-4" style="display: flow-root;">
                <h5 class="float-left " style="display: flow-root;">Email</h5>
                <span class="float-right text-monospace">pepitoperz@academiacentral.com</span>
            </div>
            <div class="border-bottom pt-4" style="display: flow-root;">
                <h5 class="float-left ">Subscripción Hasta</h5>
                <span class="float-right text-monospace">03/05/2020</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card pt-4">
                <div class="card-body text-center">
                    <h4 class="">Cambiar Contraseña</h4>
                    <form action="">
                        <div class="form-group">
                            <input type="text" placeholder="nueva contraseña" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="confirmar nueva contraseña" class="form-control">
                        </div>
                        <div class="alert alert-warning" role="alert">
							El minimo de la contraseña es de 8 caracteres.
						</div>
                        <div class="form-group">
                            <button class="boton-principal btn btn-primary btn-lg btn-block my-4 ">Cambiar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection