<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Executor;
use App\Http\Requests\ExecutorRequest;

class executorController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $executores = Executor::orderBy('tipoExecutor')->paginate(10);
        else
            $executores = Executor::where('tipoExecutor', 'like', '%'.$filtragem.'%')
                                        ->orderBy("tipoExecutor")
                                        ->paginate(10);
        return view('executores.index', ['executores'=>$executores]);
    }

    public function create(){
        return view('executores.create');
    }

    public function store(ExecutorRequest $request){
        $novo_executor = $request->all();
        Executor::create($novo_executor);

        return redirect()->route('executor');
    }

    public function destroy($id){
        Executor::find($id)->delete();
        return redirect()->route('executor');
    }

    public function edit(Request $request){
        $executor = Executor::find(\Crypt::decrypt($request->get('id')));
        return view('executores.edit', compact('executor'));
    }

    public function update(ExecutorRequest $request, $id){
        Executor::find($id)->update($request->all());
        return redirect()->route('executor');
    }
}
