<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Http\Requests\AgendamentoRequest;

class agendamentoController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $agendamentos = Agendamento::orderBy('data')->paginate(10);
        else
            $agendamentos = Agendamento::where('data', '=', '%'.$filtragem.'%')
                                        ->orderBy("data")
                                        ->paginate(10);
        return view('agendamentos.index', ['agendamentos'=>$agendamentos]);
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
        Agendamento::find($id)->update($request->all());
        return redirect()->route('home');
    }

}
