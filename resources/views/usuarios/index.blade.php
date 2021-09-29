<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
        <h1>Usuários</h1>
        {!! Form::open(['name'=>'form_name', 'route'=>'usuario']) !!}
                <div class="sidebar-form">
                        <div class="input-group">
                                <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa">
                                <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </span>
                        </div>
                </div>
        {!! Form::close() !!}
        <br>
        <table class="table table-stripe table-bordered table-hover">
                <thead>
                        <th>Nome</th>
                        <th>User</th>
                        <th>Telefone</th>
                        <th>Executor</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->user }}</td>
                                <td>{{ $usuario->telefone }}</td>
                                <td>{{ $usuario->executor->tipoExecutor }}</td>
                                <td>
                                        <a href="{{ route('usuario.edit', ['id'=>\Crypt::encrypt($usuario->id_usuario)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('usuario.destroy', ['id'=>$usuario->id_usuario]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>

         {{ $usuarios->links() }}
         <a href="{{ route('usuario.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop