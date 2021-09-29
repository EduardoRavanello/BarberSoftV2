<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Http\Requests\ServicoRequest;

class servicoController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $servicos = Servico::orderBy('descricao')->paginate(10);
        else
            $servicos = Servico::where('descricao', 'like', '%'.$filtragem.'%')
                                        ->orderBy("descricao")
                                        ->paginate(10);
        return view('servicos.index', ['servicos'=>$servicos]);
    }

    public function create(){
        return view('servicos.create');
    }

    public function store(ServicoRequest $request){
        $novo_servico = $request->all();
        Servico::create($novo_servico);

        return redirect()->route('servico');
    }

    public function destroy($id){
        Servico::find($id)->delete();
        return redirect()->route('servico');
    }

    public function edit(Request $request){
        $servico = Servico::find(\Crypt::decrypt($request->get('id')));
        return view('servicos.edit', compact('servico'));
    }

    public function update(ServicoRequest $request, $id){
        Servico::find($id)->update($request->all());
        return redirect()->route('servico');
    }
}
