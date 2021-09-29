<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;

class usuarioController extends Controller
{
    //

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $usuarios = Usuario::orderBy('nome')->paginate(10);
        else
            $usuarios = Usuario::where('nome', 'like', '%'.$filtragem.'%')
                                        ->orderBy("nome")
                                        ->paginate(10);
        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(UsuarioRequest $request){
        $novo_usuario = $request->all();
        Usuario::create($novo_usuario);

        return redirect()->route('usuario');
    }

    public function destroy($id){
        Usuario::find($id)->delete();
        return redirect()->route('usuario');
    }

    public function edit(Request $request){
        $usuario = Usuario::find(\Crypt::decrypt($request->get('id')));
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, $id){
        Usuario::find($id)->update($request->all());
        return redirect()->route('usuario');
    }
}
