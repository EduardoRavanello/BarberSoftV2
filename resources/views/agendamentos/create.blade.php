@extends('adminlte::page')

@section('content')
    <h3>Novo Agendamento</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'agendamento.store']) !!}
        <div class="form-group">
            {!! Form::label('dataInicio', 'Data Inicio:') !!}
            {!! Form::dateTime('dataInicio', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dataFim', 'Data Fim:') !!}
            {!! Form::dateTime('dataFim', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_cliente', 'Cliente:') !!}
            {!! Form::select('id_cliente', \App\Models\Cliente::orderBy('nome')->pluck('nome','id_cliente')->toArray(), 'Escolher', ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_servico', 'Serviço:') !!}
            {!! Form::select('id_servico', \App\Models\Servico::orderBy('descricao')->pluck('descricao','id_servico')->toArray(), 'Escolher', ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_executor', 'Executor:') !!}
            {!! Form::select('id_executor', \App\Models\Executor::orderBy('tipoExecutor')->pluck('tipoExecutor','id_executor')->toArray(), 'Escolher', ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', array('Criado'=>'Criado','Agendado'=>'Agendado','Finalizado'=>'Flinalizado','Cancelado'=>'Cancelado'), 'Criado', ['class'=>'form-control','required']) !!}
        </div>

        <div class='input_fields_wrap'>
            
        </div>


        <div class="form-group">
            {!! Form::submit('Criar Agendamento', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

        
    {!! Form::close() !!}
@stop
