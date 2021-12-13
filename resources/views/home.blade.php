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

    <div style="height: 300px">
        <canvas id="chartEntrada" width="200" height="200"></canvas>
      </div>

    <div class="row justify-content-center">
          <div style="height: 300px">     
              <canvas id="chartServicos" width="400" height="400"></canvas>
          </div>
            

          <div style="height: 300px"> 
            <canvas id="chartStatus" width="400" height="400"></canvas>
          </div>

          <div style="height: 300px">
            <canvas id="chartTma" width="300" height="300"></canvas>
          </div>

      </div>
      <div class="row justify-content-center">
            <div style="height: 300px"> 
              <canvas id="chartPrecoMedio" width="300" height="300"></canvas>
            </div>

            <div style="height: 300px"> 
              <canvas id="chartFatCons" width="300" height="300"></canvas>
            </div>

            <div style="height: 300px"> 
              <canvas id="chartCancel" width="300" height="300"></canvas>
            </div>
      </div>
</div>



 <script src="{{ asset('assets/chart.js') }}"></script>
<script>
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
                     type: 'line',
                     data: {
                        
                         labels: {!! json_encode($testedadosmes) !!},
                         datasets: [{
                             label: 'Quantidade de agendamentos nos ultimos meses',
                             data: {!! json_encode($testedadosqtd) !!},
                             
                             borderColor: [
                                 'rgb(75, 192, 192)'
                             ],
                             borderWidth: 1
                         }]
                     },
                     options: {
                      responsive: true, maintainAspectRatio: false
                     }
                 });
                });

        // grafico de serviços

                var dadosServico = {!! json_encode($dadosServico) !!};
                console.log(dadosServico);
        
        <?php
                  $testedadosservico = [];
                  $testedadoservicoqtd = [];
                 $cont = 0;
                 foreach ($dadosServico as $item){
                    $testedadoservicoqtd[$cont] = $item->quantidade;
                    $testedadosservico[$cont] = $item->serviço;
                    $cont++;
                  }

?>
        //console.log(dadosServicos);
                 var ctx = document.getElementById('chartServicos').getContext('2d');

                 var myChart = new Chart(ctx, {
                     type: 'doughnut',
                     data: {
                        
                         labels: {!! json_encode($testedadosservico) !!},
                         datasets: [{
                             label: 'Quantidade de serviços executados (Finalizados)',
                             data: {!! json_encode($testedadoservicoqtd) !!},
                             backgroundColor: [
                              'rgba(255, 0, 132, 0.2)',
                                 'rgba(19, 255, 0, 0.2)',
                                 'rgba(39, 46, 245, 0.2)',
                                 'rgba(75, 192, 192, 0.2)',
                                 'rgba(153, 102, 255, 0.2)',
                                 'rgba(255, 159, 64, 0.2)',
                                 'rgb(74,225,243,0.2)'
                             ],
                             borderColor: [
                              'rgba(255, 99, 132, 1)',
                                 'rgba(80, 245, 39, 1)',
                                 'rgba(39, 46, 245, 1)',
                                 'rgba(75, 192, 192, 1)',
                                 'rgba(153, 102, 255, 1)',
                                 'rgba(255, 159, 64, 1)',
                                 'rgb(74,225,243, 1)'
                             ],
                             borderWidth: 1
                         }]
                     },
                     options: {
                      responsive: true, maintainAspectRatio: false
                         }
                     
                 });


                 // grafico de Status

                var dadosStatus = {!! json_encode($dadosStatus) !!};
                
        
        <?php
                  $testedadosStatus = [];
                  $testedadostatusqtd = [];
                 $cont = 0;
                 foreach ($dadosStatus as $item){
                    $testedadostatusqtd[$cont] = $item->quantidade;
                    $testedadosStatus[$cont] = $item->status;
                    $cont++;
                  }

          ?>
                console.log(dadosStatus);      
                 var ctx = document.getElementById('chartStatus').getContext('2d');

                 var myChart = new Chart(ctx, {
                     type: 'doughnut',
                     data: {
                        
                         labels: {!! json_encode($testedadosStatus) !!},
                         datasets: [{
                             label: 'Agendamentos X Status',
                             data: {!! json_encode($testedadostatusqtd) !!},
                             backgroundColor: [
                              'rgba(255, 0, 132, 0.2)',
                                 'rgba(19, 255, 0, 0.2)',
                                 'rgba(39, 46, 245, 0.2)',
                                 'rgba(75, 192, 192, 0.2)',
                                 'rgba(153, 102, 255, 0.2)',
                                 'rgba(255, 159, 64, 0.2)',
                                 'rgb(74,225,243,0.2)'
                             ],
                             borderColor: [
                              'rgba(255, 99, 132, 1)',
                                 'rgba(80, 245, 39, 1)',
                                 'rgba(39, 46, 245, 1)',
                                 'rgba(75, 192, 192, 1)',
                                 'rgba(153, 102, 255, 1)',
                                 'rgba(255, 159, 64, 1)',
                                 'rgb(74,225,243, 1)'
                             ],
                             borderWidth: 1
                         }]
                     },
                     options: {
                      responsive: true, maintainAspectRatio: false
                     }
                 });


                 // grafico de TMA

                var dadosTma = {!! json_encode($dadosTma) !!};

                <?php
                  $testedadosTma = [];
                 $cont = 0;
                 foreach ($dadosTma as $item){
                    $testedadosTma[$cont] = $item->tma;
                    $cont++;
                  }

                ?>
                
                        console.log(dadosTma);      
                         var ctx = document.getElementById('chartTma').getContext('2d');
        
                         var myChart = new Chart(ctx, {
                             type: 'doughnut',
                             data: {
                                
                                 labels: ['TMA'],
                                 datasets: [{
                                     label: 'Tempo Médio de Atendimento (agendamentos finalizados)',
                                     data: {!! json_encode($testedadosTma) !!},
                                     backgroundColor: [
                                         'rgba(255, 159, 64, 0.2)'
                                     ],
                                     borderColor: [
                                         'rgba(255, 159, 64, 1)'
                                     ],
                                     borderWidth: 1
                                 }]
                             },
                             options: {
                              responsive: true, maintainAspectRatio: false
                             }
                         });


                         // grafico de Preço Médio

                var dadosPrecoMedio = {!! json_encode($dadosPrecoMedio) !!};

                  <?php
                    $testedadosPrecoMedio = [];
                  $cont = 0;
                  foreach ($dadosPrecoMedio as $item){
                      $testedadosPrecoMedio[$cont] = $item->preco;
                      $cont++;
                    }

                  ?>

                console.log(dadosTma);      
                var ctx = document.getElementById('chartPrecoMedio').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        
                        labels: ['Preço Médio dos Serviços Finalizados'],
                        datasets: [{
                            label: 'Preço Médio (agendamentos finalizados)',
                            data: {!! json_encode($testedadosPrecoMedio) !!},
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)',
                            ],
                            borderColor: [
                                'rgba(153, 102, 255, 1)',

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                      responsive: true, maintainAspectRatio: false
                    }
                });



                 // grafico de Faturamento Consolidado

                 var dadosFatCons = {!! json_encode($dadosFatCons) !!};

                <?php
                  $testedadosFatCons = [];
                  $testedadosFatConsMes = [];
                $cont = 0;
                foreach ($dadosFatCons as $item){
                  if($item->mes == 1){
                     $testedadosFatConsMes[$cont] = "Janeiro";
                  } 
                  elseif($item->mes == 2){
                   $testedadosFatConsMes[$cont] = "Fevereiro";
                  }
                  elseif($item->mes == 3){
                    $testedadosFatConsMes[$cont] = "Março";
                   }
                   elseif($item->mes == 4){
                    $testedadosFatConsMes[$cont] = "Abril";
                   }
                   elseif($item->mes == 5){
                    $testedadosFatConsMes[$cont] = "Maio";
                   }
                   elseif($item->mes == 6){
                    $testedadosFatConsMes[$cont] = "Junho";
                   }
                   elseif($item->mes == 7){
                    $testedadosFatConsMes[$cont] = "Julho";
                   }
                   elseif($item->mes == 8){
                    $testedadosFatConsMes[$cont] = "Agosto";
                   }
                   elseif($item->mes == 9){
                    $testedadosFatConsMes[$cont] = "Setembro";
                   }
                   elseif($item->mes == 10){
                    $testedadosFatConsMes[$cont] = "Outubro";
                   }
                   elseif($item->mes == 11){
                    $testedadosFatConsMes[$cont] = "Novembro";
                   }
                   elseif($item->mes == 12){
                    $testedadosFatConsMes[$cont] = "Dezembro";
                   }
                    $testedadosFatCons[$cont] = $item->faturamento;
                    $cont++;
                  }

                ?>

                console.log(dadosFatCons);      
                var ctx = document.getElementById('chartFatCons').getContext('2d');

                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      
                      labels: {!! json_encode($testedadosFatConsMes) !!},
                      datasets: [{
                          label: 'Faturamento Consolidado',
                          data: {!! json_encode($testedadosFatCons) !!},
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
                    responsive: true, maintainAspectRatio: false
                  }
                });



                // grafico de Cancelados

                var dadosCancel = {!! json_encode($dadosCancel) !!};

                <?php
                  $testedadosCancelQtd = [];
                  $testedadosCancelMes = [];
                $cont = 0;
                foreach ($dadosCancel as $item){
                  if($item->mes == 1){
                    $testedadosCancelMes[$cont] = "Janeiro";
                  } 
                  elseif($item->mes == 2){
                  $testedadosCancelMes[$cont] = "Fevereiro";
                  }
                  elseif($item->mes == 3){
                    $testedadosCancelMes[$cont] = "Março";
                  }
                  elseif($item->mes == 4){
                    $testedadosCancelMes[$cont] = "Abril";
                  }
                  elseif($item->mes == 5){
                    $testedadosCancelMes[$cont] = "Maio";
                  }
                  elseif($item->mes == 6){
                    $testedadosCancelMes[$cont] = "Junho";
                  }
                  elseif($item->mes == 7){
                    $testedadosCancelMes[$cont] = "Julho";
                  }
                  elseif($item->mes == 8){
                    $testedadosCancelMes[$cont] = "Agosto";
                  }
                  elseif($item->mes == 9){
                    $testedadosCancelMes[$cont] = "Setembro";
                  }
                  elseif($item->mes == 10){
                    $testedadosCancelMes[$cont] = "Outubro";
                  }
                  elseif($item->mes == 11){
                    $testedadosCancelMes[$cont] = "Novembro";
                  }
                  elseif($item->mes == 12){
                    $testedadosCancelMes[$cont] = "Dezembro";
                  }
                    $testedadosCancelQtd[$cont] = $item->quantidade;
                    $cont++;
                  }

                ?>

                console.log(dadosCancel);      
                var ctx = document.getElementById('chartCancel').getContext('2d');

                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      
                      labels: {!! json_encode($testedadosCancelMes) !!},
                      datasets: [{
                          label: 'Agendamentos cancelados X Mês',
                          data: {!! json_encode($testedadosCancelQtd) !!},
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
                    responsive: true, maintainAspectRatio: false
                  }
                });

</script>
@endsection


