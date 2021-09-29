<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home',['contadorProduto'=>$this->contadorProduto(),
        'contadorAgendamento'=>$this->contadorAgendamento(),
        'contadorCliente'=>$this->contadorCliente(),
        'contadorServico'=>$this->contadorServico()]);
    }

    private function contadorProduto(){
       return \App\Models\Produto::where('id_produto', '>', '0')
       ->count();
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
}
