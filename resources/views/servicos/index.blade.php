<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
        <h1>Serviços</h1>
        {!! Form::open(['name'=>'form_name', 'route'=>'servico']) !!}
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
                        <th>Descrição</th>
                        <th>Tempo de Atendimento</th>
                        <th>Preço</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($servicos as $servico)
                        <tr>
                                <td>{{ $servico->descricao }}</td>
                                <td>{{ $servico->tempoAtendimento }}</td>
                                <td>{{ $servico->preco }}</td>
                                <td>
                                        <a href="{{ route('servico.edit', ['id'=>\Crypt::encrypt($servico->id_servico)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('servico.destroy', ['id'=>$servico->id_servico]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>

         {{ $servicos->links() }}
         <a href="{{ route('servico.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop