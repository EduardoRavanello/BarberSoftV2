@extends('adminlte::page')

@section('content')
  
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="row">
        <div class="col-lg-3 col-xs-6">
          
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $contadorServico }}</h3>

              <p>Serviços Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('servico')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $contadorCliente }}</h3>

              <p>Clientes Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('cliente')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $contadorAgendamento }}</h3>

              <p>Agendamentos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('agendamento')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
        </div>
    </div>
    <div width="200" height="200">
    <canvas id="chartEntrada" width="200" height="200"></canvas>
    </div>
    <!-- 
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  </ul>
                </div>
              </div> --><!-- /.card-header -->
              <!--
              <div class="card-body">
                <div class="tab-content p-0"> -->
                  <!-- Morris chart - Sales -->
                  <!--<div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div>
--><!-- /.card-body -->
            <!--</div>
            <div class="row" >
            <div class="col-xl col-md-3 mb-4">
                <div class="card-dash shadow h-100 py-2">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-3">Gráfico de Entradas</h4>
                        <hr>
                        <div class="inbox-wid">
                            <div class="inbox-item">
                                <canvas id="chartEntrada" width="200" height="30"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->

</div>

<div id="calendar"></div>


 <script src="{{ asset('assets/chart.js') }}"></script>
<script>
        // $.ajax({
        //     type: "GET",
        //     url: "{{ URL('/graficoServicoMeses') }}",
        //     dataType: "json",
        //     headers: {
        //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        //     },
        //     success: function(data) {
        //       console.log(data); 
                //  var data = "< ?= htmlspecialchars($dados) ?>";
                $(document).ready(function(){

                
                var dados = {!! json_encode($dados) !!};
               
             
<?php
                  $testedadosmes = [];
                  $testedadosqtd = [];
                 $cont = 0;
                 foreach ($dados as $item){
                    if($item->mes == 1){
                       $testedadosmes[$cont] = "Janeiro";
                    } 
                    elseif($item->mes == 2){
                     $testedadosmes[$cont] = "Fevereiro";
                    }
                    elseif($item->mes == 3){
                      $testedadosmes[$cont] = "Março";
                     }
                     elseif($item->mes == 4){
                      $testedadosmes[$cont] = "Abril";
                     }
                     elseif($item->mes == 5){
                      $testedadosmes[$cont] = "Maio";
                     }
                     elseif($item->mes == 6){
                      $testedadosmes[$cont] = "Junho";
                     }
                     elseif($item->mes == 7){
                      $testedadosmes[$cont] = "Julho";
                     }
                     elseif($item->mes == 8){
                      $testedadosmes[$cont] = "Agosto";
                     }
                     elseif($item->mes == 9){
                      $testedadosmes[$cont] = "Setembro";
                     }
                     elseif($item->mes == 10){
                      $testedadosmes[$cont] = "Outubro";
                     }
                     elseif($item->mes == 11){
                      $testedadosmes[$cont] = "Novembro";
                     }
                     elseif($item->mes == 12){
                      $testedadosmes[$cont] = "Dezembro";
                     }
                  
                    //$testedadosmes[$cont] = "janeiro";
                    $testedadosqtd[$cont] = $item->quantidade;
                    $cont++;
                  }

?>
                 
                 console.log(dados);
                 var ctx = document.getElementById('chartEntrada').getContext('2d');

                 var myChart = new Chart(ctx, {
                     type: 'bar',
                     data: {
                        
                         labels: {!! json_encode($testedadosmes) !!},
                         datasets: [{
                             label: 'Quantidade de agendamentos nos ultimos meses',
                             data: {!! json_encode($testedadosqtd) !!},
                             backgroundColor: [
                                 'rgba(255, 99, 132, 0.2)',
                                 'rgba(54, 162, 235, 0.2)',
                                 'rgba(255, 206, 86, 0.2)',
                                 'rgba(75, 192, 192, 0.2)',
                                 'rgba(153, 102, 255, 0.2)',
                                 'rgba(255, 159, 64, 0.2)',
                                 'rgb(74,225,243,0.2)'
                             ],
                             borderColor: [
                                 'rgba(255, 99, 132, 1)',
                                 'rgba(54, 162, 235, 1)',
                                 'rgba(255, 206, 86, 1)',
                                 'rgba(75, 192, 192, 1)',
                                 'rgba(153, 102, 255, 1)',
                                 'rgba(255, 159, 64, 1)',
                                 'rgb(74,225,243, 1)'
                             ],
                             borderWidth: 1
                         }]
                     },
                     options: {
                         scales: {
                             y: {
                                 beginAtZero: true
                             }
                         }
                     }
                 });
                });
        //     },
        //     error: function(response) {
        //         console.log(response);
        //     }
        // });
</script>
@endsection


