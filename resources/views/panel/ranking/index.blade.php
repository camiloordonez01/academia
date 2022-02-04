@extends('layouts.main')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
    	<div class="col-md-6">
    		<h1>Ranking de usuarios</h1>
    	</div>
    	<div class="col-md-6 text-right">
    		<h3>Mi identificacion es: <span style="color: #F7BE2C; font-weight: bold;">{{$idUser}}</span></h3>
    	</div>
    	<div class="col-md-6 mt-4">
    		<table class="table">
    			<h2>Top 10 de hoy</h2>
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Identificacion</th>
			      <th scope="col">Acertadas</th>
			      <th scope="col">Falladas</th>
			      <th scope="col">Puntos</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($datosdiarios as $dato)
			    <tr>
			      <th scope="row">{{ $loop->iteration }}</th>
			      <td>{{$dato['users_id']}}</td>
			      <td>{{$dato['correctas']}}</td>
			      <td>{{$dato['incorrectas']}}</td>
			      <td>{{$dato['puntos']}}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
    	</div>
    	<div class="col-md-6 mt-4">
    		<table class="table">
    			<h2>Top 10 de este mes</h2>
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Identificacion</th>
			      <th scope="col">Acertadas</th>
			      <th scope="col">Falladas</th>
			      <th scope="col">Puntos</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($datosmensuales as $dato)
			    <tr>
			      <th scope="row">{{ $loop->iteration }}</th>
			      <td>{{$dato['users_id']}}</td>
			      <td>{{$dato['correctas']}}</td>
			      <td>{{$dato['incorrectas']}}</td>
			      <td>{{$dato['puntos']}}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
    	</div>
    </div>
</div>
@endsection