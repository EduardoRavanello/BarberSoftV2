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
      //dd($var);
        return view('home',['contadorAgendamento'=>$this->contadorAgendamento(),
        'contadorCliente'=>$this->contadorCliente(),
        'contadorServico'=>$this->contadorServico(), 'dados'=>($var)]);
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
     
     // $array = Agendamento::whereBetween('dataInicio', ["01/01/2021", "31/12/2021"])->get()->toArray();
   //    $array = Agendamento::select(Agendamento::raw('count("dataInicio") as quantidade'))
   //   ->groupBy('Extract(Month From("dataInicio"))')->get()->toArray();

      $array = DB::table('agendamentos')
      ->selectRaw('count("data") as quantidade, Extract(Month From("data")) as mes')
      ->groupByRaw('Extract(Month From("data"))')->orderByRaw('mes ASC')->get()->ToArray();
      return $array;
     // $var = Agendamento::whereBetween('data', ["01/07/2021", "31/12/2021"])->toArray();
     // dd($array);
      
     }
}
