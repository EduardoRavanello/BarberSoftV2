@extends('adminlte::page')

@section('content')
    <h3>Editando Produto: {{ $produto->descricao }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["produto.update", 'id'=>$produto->id_produto], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $produto->descricao, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('quantidade', 'Quantidade:') !!}
            {!! Form::number('quantidade', $produto->quantidade, ['class'=>'form-control','required', 'step' => '0.01']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('valorUnit', 'Valor Unitário:') !!}
            {!! Form::number('valorUnit', $produto->valorUnit, ['class'=>'form-control','required','step' => '0.01']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('valorTotal', 'Valor Total:') !!}
            {!! Form::number('valorTotal', $produto->valorTotal, ['class'=>'form-control','required','step' => '0.01']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop