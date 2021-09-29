<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;

class produtoController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $produtos = Produto::orderBy('descricao')->paginate(10);
        else
            $produtos = Produto::where('descricao', 'like', '%'.$filtragem.'%')
                                        ->orderBy("descricao")
                                        ->paginate(10);
        return view('produtos.index', ['produtos'=>$produtos]);
    }

    public function create(){
        return view('produtos.create');
    }

    public function store(ProdutoRequest $request){
        $novo_produto = $request->all();
        Produto::create($novo_produto);

        return redirect()->route('produto');
    }

    public function destroy($id){
        Produto::find($id)->delete();
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
