<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Http\Requests\AgendamentoRequest;
Use App\Mail\newLaravelTips;
use App\Models\Cliente;
use App\Models\Servico;

class agendamentoController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        $filtroData = $filtro->get('dataAtual');
        if (!empty($filtroData) && !empty($filtragem))
        {
            $agendamentos = Agendamento::whereRaw("data = '$filtroData'")->where('status', 'like', '%'.$filtragem.'%')->orderBy('status')->paginate(10);
        }
        else if (!empty($filtagem))
        {
        $agendamentos = Agendamento::where('status', 'like', '%'.$filtragem.'%')
                                                ->orderBy("status")
                                                ->paginate(10);
        }
        else if (!empty($filtroData))
        {
        $agendamentos = Agendamento::whereRaw("data = '$filtroData'")->orderBy('data')->paginate(10);
        }
        else
        {
        $agendamentos = Agendamento::whereRaw("data >= current_date")->orderBy('data')->paginate(10);
        }
        $data = $filtroData ?? date('Y-m-d');
        $descfiltro = $filtragem ?? '';
        return view('agendamentos.index', ['agendamentos'=>$agendamentos, 'data' => $data, 'descfiltro' => $descfiltro]);
    }

    public function create(){
        return view('agendamentos.create');
    }

    public function store(Request $request){
        $agendamento = Agendamento::create([
            'data'=> $request->get('data'),
            'hora'=> $request->get('hora'),
            'status'=> $request->get('status'),
            'id_cliente'=> $request->get('id_cliente'),
            'id_executor'=> $request->get('id_executor'),
            'id_servico'=> $request->get('id_servico')
        ]);
        

        return redirect()->route('agendamento');
    }

    public function destroy($id){
        Agendamento::find($id)->delete();
        return redirect()->route('agendamento');
    }

    public function edit(Request $request){
        $agendamento = Agendamento::find(\Crypt::decrypt($request->get('id')));
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(AgendamentoRequest $request, $id){
        $agendamento = Agendamento::find($id);
        $agendamento->update($request->all());
        $agendamento->refresh();
        
        $usuario = Cliente::find($agendamento->id_cliente);
        $servico = Servico::find($agendamento->id_servico);

        $user = new \stdClass();
        $user->name = $usuario->nome;
        $user->email = $usuario->email;
        $user->servico = $servico->descricao;
        $user->data = $agendamento->data;
        $user->hora = $agendamento->hora;
        //return new App\Mail\newLaravelTips($user);
       \Illuminate\Support\Facades\Mail::send(new newLaravelTips($user));
        return redirect()->route('agendamento');
    }

}
