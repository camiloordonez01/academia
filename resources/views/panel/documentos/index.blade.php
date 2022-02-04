@extends('layouts.main')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Documentos</h1>
        </div>
        <div class="col-md-12 text-center mb-5">
            <button class="btn boton-principal" id="btnResumenes" onclick="tabDocumentos(1)">Resúmenes</button>
            <button class="btn boton-principal desactive" id="btnAudios" onclick="tabDocumentos(2)">Audios</button>
            <button class="btn boton-principal desactive" id="btnPsicotecnicos" onclick="tabDocumentos(3)">Psicotécnicos</button>
        </div>
        <div class="col-md-12" id="resumenes">
            <div class="container-fluid">
                <div class="row">
                    @if(count($datos[0][0])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Comunicaciones</li>
                            @foreach ($datos[0][0] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][1])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Constitución</li>
                            @foreach ($datos[0][1] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][2])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Decreto Legislativo 1/2006</li>
                            @foreach ($datos[0][2] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][3])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Espacios Naturales Protegidos</li>
                            @foreach ($datos[0][3] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][4])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Estatuto Básico del Empleado Público</li>
                            @foreach ($datos[0][4] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][5])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Exámenes Oficiales</li>
                            @foreach ($datos[0][5] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][6])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">INFOMA</li>
                            @foreach ($datos[0][6] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][7])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Igualdad</li>
                            @foreach ($datos[0][7] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][8])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Incendios forestales</li>
                            @foreach ($datos[0][8] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][9])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Ley de Prevención de Riesgos Laborales</li>
                            @foreach ($datos[0][9] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][10])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Los Servicios de Bomberos</li>
                            @foreach ($datos[0][10] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][11])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Orografía</li>
                            @foreach ($datos[0][11] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][12])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2018-2019 (100 plazas)</li>
                            @foreach ($datos[0][12] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][13])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2019-2020 (150 plazas)</li>
                            @foreach ($datos[0][13] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][14])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Teoría del fuego</li>
                            @foreach ($datos[0][14] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][15])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Carreteras</li>
                            @foreach ($datos[0][15] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][16])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hidrografía</li>
                            @foreach ($datos[0][16] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][17])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hojas de respuesta</li>
                            @foreach ($datos[0][17] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[0][18])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Psicotécnicos</li>
                            @foreach ($datos[0][18] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12" id="audios" style="display: none">
            <div class="container-fluid">
                <div class="row">
                    @if(count($datos[1][0])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Comunicaciones</li>
                            @foreach ($datos[1][0] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][1])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Constitución</li>
                            @foreach ($datos[1][1] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][2])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Decreto Legislativo 1/2006</li>
                            @foreach ($datos[1][2] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][3])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Espacios Naturales Protegidos</li>
                            @foreach ($datos[1][3] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][4])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Estatuto Básico del Empleado Público</li>
                            @foreach ($datos[1][4] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][5])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Exámenes Oficiales</li>
                            @foreach ($datos[1][5] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][6])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">INFOMA</li>
                            @foreach ($datos[1][6] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][7])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Igualdad</li>
                            @foreach ($datos[1][7] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][8])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Incendios forestales</li>
                            @foreach ($datos[1][8] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][9])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Ley de Prevención de Riesgos Laborales</li>
                            @foreach ($datos[1][9] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][10])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Los Servicios de Bomberos</li>
                            @foreach ($datos[1][10] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][11])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Orografía</li>
                            @foreach ($datos[1][11] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][12])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2018-2019 (100 plazas)</li>
                            @foreach ($datos[1][12] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][13])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2019-2020 (150 plazas)</li>
                            @foreach ($datos[1][13] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][14])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Teoría del fuego</li>
                            @foreach ($datos[1][14] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][15])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Carreteras</li>
                            @foreach ($datos[1][15] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][16])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hidrografía</li>
                            @foreach ($datos[1][16] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][17])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hojas de respuesta</li>
                            @foreach ($datos[1][17] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[1][18])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Psicotécnicos</li>
                            @foreach ($datos[1][18] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12" id="psicotecnicos" style="display: none">
            <div class="container-fluid">
                <div class="row">
                    @if(count($datos[2][0])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Comunicaciones</li>
                            @foreach ($datos[2][0] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][1])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Constitución</li>
                            @foreach ($datos[2][1] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][2])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Decreto Legislativo 1/2006</li>
                            @foreach ($datos[2][2] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][3])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Espacios Naturales Protegidos</li>
                            @foreach ($datos[2][3] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][4])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Estatuto Básico del Empleado Público</li>
                            @foreach ($datos[2][4] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][5])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Exámenes Oficiales</li>
                            @foreach ($datos[2][5] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][6])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">INFOMA</li>
                            @foreach ($datos[2][6] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][7])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Igualdad</li>
                            @foreach ($datos[2][7] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][8])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Incendios forestales</li>
                            @foreach ($datos[2][8] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][9])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Ley de Prevención de Riesgos Laborales</li>
                            @foreach ($datos[2][9] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][10])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Los Servicios de Bomberos</li>
                            @foreach ($datos[2][10] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][11])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Orografía</li>
                            @foreach ($datos[2][11] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][12])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2018-2019 (100 plazas)</li>
                            @foreach ($datos[2][12] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][13])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Simulacros oposición 2019-2020 (150 plazas)</li>
                            @foreach ($datos[2][13] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][14])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Teoría del fuego</li>
                            @foreach ($datos[2][14] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][15])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Carreteras</li>
                            @foreach ($datos[2][15] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][16])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hidrografía</li>
                            @foreach ($datos[2][16] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][17])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Hojas de respuesta</li>
                            @foreach ($datos[2][17] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(count($datos[2][18])>0)
                    <div class="col-md-4 mb-3">
                        <ul class="tableDocumentoView">
                            <li class="activeLi">Psicotécnicos</li>
                            @foreach ($datos[2][18] as $item)
                            <li><a href="{{Storage::url($item->urlDocumento)}}" target="_blank"><i class="far fa-file-pdf" width="25"></i>{{$item->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    });
    function tabDocumentos(item){
        if(item==1){
            $('#resumenes').css('display','block');
            $('#audios').css('display','none');
            $('#psicotecnicos').css('display','none');

            $('#btnResumenes').removeClass('desactive');
            $('btnAudios').addClass('desactive');
            $('#btnPsicotecnicos').addClass('desactive');
        }else if(item==2){
            $('#resumenes').css('display','none');
            $('#audios').css('display','block');
            $('#psicotecnicos').css('display','none');

            $('#btnResumenes').addClass('desactive');
            $('#btnAudios').removeClass('desactive');
            $('#btnPsicotecnicos').addClass('desactive');
        }else if(item==3){
            $('#resumenes').css('display','none');
            $('#audios').css('display','none');
            $('#psicotecnicos').css('display','block');

            $('#btnResumenes').addClass('desactive');
            $('#btnAudios').addClass('desactive');
            $('#btnPsicotecnicos').removeClass('desactive');
        }
    }
</script>
@endsection