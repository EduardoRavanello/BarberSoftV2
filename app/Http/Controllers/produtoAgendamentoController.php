<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoAgendamento;
use App\Http\Requests\ProdutoRequest;

class produtoAgendamentoController extends Controller
{
    //

    public function index(Request $filtro){
        $produtoAgendamentos = ProdutoAgendamento::find(\Crypt::decrypt($request->get('id_agendamento')));
        return view('produtoAgendamento.index', ['produtoAgendamentos'=>$produtoAgendamentos]);
    }

    public function create(){
        return view('produtosAgendamentos.create');
    }

    public function store(ProdutoRequest $request){
        $novo_produto = $request->all();
        Produto::create($novo_produto);

        return redirect()->route('produto');
    }

    public function destroy($id){
        Executor::find($id)->delete();
        return redirect()->route('produto');;
    }

    public function edit(Request $request){
        $produto = Produto::find(\Crypt::decrypt($request->get('id')));
        return view('produtos.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, $id){
        Produto::find($id)->update($request->all());
        return redirect()->route('produto');
    }
}