<!DOCTYPE html>
<html>
@extends('adminlte::page')

@section('content')
<h1>Especialidades</h1>
        {!! Form::open(['name'=>'form_name', 'route'=>'especialidade']) !!}
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
                        <th>Ações</th>
                </thead>
                <tbody>
                        @foreach($especialidades as $especialidade)
                        <tr>
                                <td>{{ $especialidade->descricao }}</td>
                                <td>
                                        <a href="{{ route('especialidade.edit', ['id'=>\Crypt::encrypt($especialidade->id_especialidade)]) }}" class="btn-sm btn-success">Editar</a>
                                        <a href="{{ route('especialidade.destroy', ['id'=>$especialidade->id_especialidade]) }}" class="btn-sm btn-danger">Remover</a>
                                </td>
                        <tr>
                        @endforeach
                </tbody>
         </table>
         {{ $especialidades->links() }}
         
         <a href="{{ route('especialidade.create', []) }}" class="btn-sm btn-info">Adicionar</a> 
@stop