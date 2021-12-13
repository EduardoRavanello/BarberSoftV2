<?php

namespace App\Http\Controllers;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $var = HomeController::graficoServicoMeses();
       $varGraphServico = HomeController::graficoServico();
       $varGraphStatus = HomeController::graficoStatus();
       $varTma = HomeController::graficoTMA();
       $varPrecoMedio = HomeController::graficoPrecoMedio();
       $varFatCons = HomeController::graficoFaturamentoConsolidado();
       $varCancelados = HomeController::graficoCancelados();
      //dd($var);
        return view('home',['contadorAgendamento'=>$this->contadorAgendamento(),
        'contadorCliente'=>$this->contadorCliente(),
        'contadorServico'=>$this->contadorServico(), 'dados'=>($var),'dadosServico'=>($varGraphServico), 
        'dadosStatus'=>($varGraphStatus),'dadosTma'=>($varTma),'dadosPrecoMedio'=>($varPrecoMedio)
        ,'dadosFatCons'=>($varFatCons) ,'dadosCancel'=>($varCancelados) ]);
      //   'contadorServico'=>$this->contadorServico(), 'dados'=>json_encode($var,JSON_NUMERIC_CHECK)]);
    }


    private function contadorAgendamento(){
        return \App\Models\Agendamento::where('id_agendamento', '>', '0')
        ->count();
     }

     private function contadorCliente(){
        return \App\Models\Cliente::where('id_cliente', '>', '0')
        ->count();
     }

     private function contadorServico(){
        return \App\Models\Servico::where('id_servico', '>', '0')
        ->count();
     }

     private function graficoServicoMeses(){

      $array = DB::table('agendamentos')
      ->selectRaw('count("data") as quantidade, Extract(Month From("data")) as mes')
      ->groupByRaw('Extract(Month From("data"))')
      ->whereRaw("agendamentos.status = 'Finalizado'")
      ->orderByRaw('mes ASC')->get()->ToArray();
      return $array;

      
     }

     private function graficoServico(){
     
       $array = DB::table('agendamentos')
       ->join('servicos', 'agendamentos.id_servico', '=', 'servicos.id_servico')
       ->selectRaw('COUNT (agendamentos.id_servico) as quantidade, servicos.descricao as serviço')->whereRaw("agendamentos.status = 'Finalizado'")
       ->groupByRaw('serviço')->get()->ToArray();
       return $array;
       
      }


      private function graficoStatus(){

         $array = DB::table('agendamentos')
         ->selectRaw('count (id_agendamento) as quantidade, status')
         ->groupByRaw('status')->get()->ToArray();
         return $array;
   
         
        }

        private function graficoTMA(){
     
         $array = DB::table('agendamentos')
         ->join('servicos', 'agendamentos.id_servico', '=', 'servicos.id_servico')
         ->selectRaw('AVG(servicos."tempoAtendimento") as tma')->whereRaw("agendamentos.status = 'Finalizado'")
         ->get()->ToArray();
         return $array;
         
        }

        private function graficoPrecoMedio(){
     
         $array = DB::table('agendamentos')
         ->join('servicos', 'agendamentos.id_servico', '=', 'servicos.id_servico')
         ->selectRaw('AVG(servicos."preco") as preco')->whereRaw("agendamentos.status = 'Finalizado'")
         ->get()->ToArray();
         return $array;
         
        }

         
        private function graficoFaturamentoConsolidado(){
     
         $array = DB::table('agendamentos')
         ->join('servicos', 'agendamentos.id_servico', '=', 'servicos.id_servico')
         ->selectRaw('SUM(servicos."preco") as faturamento, Extract(Month From(agendamentos."data")) as mes')
         ->whereRaw("agendamentos.status = 'Finalizado'")
         ->groupByRaw('Extract(Month From(agendamentos."data"))')
         ->get()
         ->ToArray();
         return $array;
         
        }

        private function graficoCancelados(){

         $array = DB::table('agendamentos')
      ->selectRaw('count("data") as quantidade, Extract(Month From("data")) as mes')
      ->groupByRaw('Extract(Month From("data"))')
      ->whereRaw("agendamentos.status = 'Cancelado'")
      ->orderByRaw('mes ASC')->get()->ToArray();
      return $array;
   
         
        }


}
