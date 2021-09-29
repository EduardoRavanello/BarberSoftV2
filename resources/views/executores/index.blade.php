<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
        <h1>Executores</h1>
        {!! Form::open(['name'=>'form_name', 'route'=>'executor']) !!}
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
                        <th>Tipo de Executor</th>
                        <th>Especialidade</th>
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($executores as $executor)
                        <tr>
                                <td>{{ $executor->tipoExecutor }}</td>
                                <td>{{ $executor->especialidade->descricao }}</td>
                                <td>
                                        <a href="{{ route('executor.edit', ['id'=>\Crypt::encrypt($executor->id_executor)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('executor.destroy', ['id'=>$executor->id_executor]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>
         {{ $executores->links() }}
         <a href="{{ route('executor.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop