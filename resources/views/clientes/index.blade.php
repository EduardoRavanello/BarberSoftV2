<!DOCTYPE html>
<html>

@extends('adminlte::page')

@section('content')
<h1>Clientes</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'cliente']) !!}
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
                        <th>Endereço</th>
                        <th>Genero</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->genero }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>
                                        <a href="{{ route('cliente.edit', ['id'=>\Crypt::encrypt($cliente->id_cliente)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('cliente.destroy', ['id'=>$cliente->id_cliente]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>
         {{ $clientes->links() }}
         <a href="{{ route('cliente.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop