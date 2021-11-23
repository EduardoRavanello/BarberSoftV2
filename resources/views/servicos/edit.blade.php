@extends('adminlte::page')

@section('content')
    <h3>Editando Serviço: {{ $servico->descricao }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["servico.update", 'id'=>$servico->id_servico], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $servico->descricao, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tempoAtendimento', 'Tempo de Atendimento(em minutos):') !!}
            {!! Form::number('tempoAtendimento', $servico->tempoAtendimento, ['class'=>'form-control','required','step' => '0.01']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('preco', 'Preço:') !!}
            {!! Form::number('preco', $servico->preco, ['class'=>'form-control','required','step' => '0.01']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Serviço', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}

@stop