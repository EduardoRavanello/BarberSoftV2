<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
        <h1>Agendamentos</h1>

        {!! Form::open(['name'=>'form_name', 'route'=>'agendamento']) !!}
                <div class="sidebar-form">
                        <div class="input-group">
                                <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa" value="{{ $descfiltro }}">
                        </div>
                </div>
                <div class="form-group">
                         {!! Form::label('dataAtual', 'Data:') !!}
                         {!! Form::date('dataAtual', $data, ['class'=>'form-control','required']) !!}
                </div>

                <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-default float-right mb-3"><i class="fa fa-search"></i> Pesquisar</button>
                </span>
        {!! Form::close() !!}
        <br>

        <table class="table table-stripe table-bordered table-hover">
                <thead>
                        <th>Status</th>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Executor</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($agendamentos as $agendamento)
                        <tr>
                                <td>{{ $agendamento->status }}</td>
                                <td>{{ $agendamento->cliente->nome }}</td>
                                <td>{{ $agendamento->servico->descricao }}</td>
                                <td>{{ Carbon\Carbon::parse($agendamento->data)->format('d/m/y') }}</td>
                                <td>{{ Carbon\Carbon::parse($agendamento->hora)->format('H:m') }}</td>
                                <td>{{ $agendamento->executor->tipoExecutor }}</td>
                                <td>
                                        <a href="{{ route('agendamento.edit', ['id'=>\Crypt::encrypt($agendamento->id_agendamento)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('agendamento.destroy', ['id'=>$agendamento->id_agendamento]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>

        {{ $agendamentos->links() }}

         <a href="{{ route('agendamento.create', []) }}" class="btn-sm btn-info">Adicionar</a>   
@stop