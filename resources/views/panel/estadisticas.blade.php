@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h1>Progreso alumno: {{$alumno}}</h1>
        </div>
        <div class="col-md-6 mt-5">
            <h3>Preguntas Acertadas y falladas totales </h3>
            <canvas id="chart-area"></canvas>
            <div id="js-legend" class="chart-legend"></div>
        </div>
        <div class="col-md-6 mt-5">
            <h3>Preguntas respondidas de todos los temas</h3>
            <canvas id="chart-area2"></canvas>
            <input type="hidden" id="tortaNumeros" value="{{$tortaNombre}}">
            <script>
                var randomScalingFactor = function() {
                    return Math.round(Math.random() * 100);
                };
                var config = {
                    type: 'bar',
                    data: {
                        datasets: [
                            { data: [{{$correctas}}], label: 'Acertadas',backgroundColor:'#46a360' },
                            { data: [{{$incorrectas}}], label: 'Falladas',backgroundColor:'#c32c30' }
                        ],
                        labels: [
                            'Totales'
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: true,
                            onClick: null,
                            position: 'bottom',
                            fullWidth: true,
                            align: 'middle'
                        },
                        plugins: {
                          datalabels: {
                            color: '#fff',
                            align: 'middler',
                            anchor: 'middle',
                            font: { weight: 'bold' },

                          }
                        }
                    }
                };
                var tortaNumeros = {{$tortaNumeros}};
                var tortaNombre = JSON.parse($('#tortaNumeros').val());
                var backgroundColor = [
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30',
                                'rgb(25, 128, 190)',
                                'rgb(4, 57, 94)',
                                'rgb(243, 88, 30)',
                                '#46a360',
                                '#c32c30'
                            ];
                var data = [];
                for (var i = 0; i < tortaNumeros.length; i++) {
                    var aux = {
                        data: [tortaNumeros[i]], 
                        label: tortaNombre[i], 
                        backgroundColor: backgroundColor[i]
                    };
                    data.push(aux);
                }
                var config2 = {
                    type: 'bar',
                    data: {
                        datasets: data,
                        labels: [
                            'Totales'
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: true,
                            onClick: null,
                            position: 'bottom',
                            fullWidth: true,
                            align: 'center'
                        },
                        plugins: {
                          datalabels: {
                            color: '#fff',
                            align: 'center',
                            anchor: 'center',
                            font: { weight: 'bold' },

                          }
                        }
                    }
                };
        
                window.onload = function() {
                    var ctx = document.getElementById('chart-area2').getContext('2d');
                    window.myPie = new Chart(ctx, config2);

                    var ctx = document.getElementById('chart-area').getContext('2d');
                    window.myPie = new Chart(ctx, config);
                };
            </script>
        </div>
        <div class="col-md-12 mt-5">
            <h3>Preguntas acertadas y falladas por tema</h3>
        </div>
        @foreach ($totalCategorias as $categoria)
        <div class="col-md-6 ">
            <div style="width: 100%;">
                <h5>
                    @if ($categoria[0]=='1')
                    Legislación
                    @elseif($categoria[0]=='2')
                    Temario específico
                    @elseif($categoria[0]=='3')
                    Resto de materias
                    @endif
                </h5>
                @foreach ($categoria[1] as $item)
                <div style="width: 98%;margin-left:2%;float: left;" class="mt-2 mb-2">
                    <div style="width: 12%;float: left;">
                        <p style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;font-size: 12px;">{{$item[3]}}</p>
                    </div>
                    <div style="height:26px; width: 80%; background-color:rgba(0,0,0,.05);padding: 4px 0px;float: left;">
                        <div style="height:6px;border-top-right-radius: 3px;border-bottom-right-radius: 3px;margin-bottom:6px;background-color:#46a360;width: {{$item[0]}}%;" class="progress-bar" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-html="true" title="{{$item[3]}} • Acertadas </br> {{$item[4]}}"></div>
                        <div style="height:6px;border-top-right-radius: 3px;border-bottom-right-radius: 3px;background-color:#c32c30;width: {{$item[1]}}%;" class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-html="true" title="{{$item[3]}} • Falladas </br> {{$item[5]}}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        <div class="col-md-12 mt-5 mb-5">
            <form method="POST" action="{{ url('/control/estadisticas') }}">
                {{ csrf_field() }}
                <button class="btn boton-principal" type="submit">Resetear Estadisticas</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endsection