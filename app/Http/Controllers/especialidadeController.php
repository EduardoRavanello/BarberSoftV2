<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;
use App\Http\Requests\EspecialidadeRequest;

class especialidadeController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $especialidades = Especialidade::orderBy('descricao')->paginate(5);
        else
            $especialidades = Especialidade::where('descricao', 'like', '%'.$filtragem.'%')
                                        ->orderBy("descricao")
                                        ->paginate(5);
        return view('especialidades.index', ['especialidades'=>$especialidades]);
    }

    public function create(){
        return view('especialidades.create');
    }

    public function store(EspecialidadeRequest $request){
        $novo_especialidade = $request->all();
        Especialidade::create($novo_especialidade);

        return redirect()->route('especialidade');
    }

    public function destroy($id){
        Especialidade::find($id)->delete();
        return redirect()->route('especialidade');
    }

    public function edit(Request $request){
        $especialidade = Especialidade::find(\Crypt::decrypt($request->get('id')));
        return view('especialidades.edit', compact('especialidade'));
    }

    public function update(EspecialidadeRequest $request, $id){
        Especialidade::find($id)->update($request->all());
        return redirect()->route('especialidade');
    }
}
