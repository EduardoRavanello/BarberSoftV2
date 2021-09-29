<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
        <h1>Produtos de Agendamentos</h1>
        {!! Form::open(['name'=>'form_name', 'route'=>'agendamento']) !!}
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
                        <th>Produto</th>
                        <th>Data do Agendamento</th>
                        <th>Hora do Agendamento</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($produtos as $produto)
                                <tr>
                                        <td>{{ $produto->descricao }}</td>
                                        <td>{{ $produto->quantidade }}</td>
                                        <td>{{ $produto->valorUnit }}</td>
                                        <td>{{ $produto->valorTotal }}</td>
                                        <td>
                                        <a href="{{ route('produto.edit', ['id'=>\Crypt::encrypt($produto->id_produto)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('produto.destroy', ['id'=>$produto->id_produto]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>
         {{ $produtos->links() }}
         <a href="{{ route('produto.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop