@extends('adminlte::page')

@section('content')
    <h3>Editando Agendamento: {{ $agendamento->hora }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["agendamento.update", 'id'=>$agendamento->id_agendamento], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('data', 'Data:') !!}
            {!! Form::date('data', $agendamento->data, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('hora', 'Hora:') !!}
            {!! Form::time('hora', $agendamento->hora, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_cliente', 'Cliente:') !!}
            {!! Form::select('id_cliente', \App\Models\Cliente::orderBy('nome')->pluck('nome','id_cliente')->toArray(), $agendamento->id_cliente, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_servico', 'Serviço:') !!}
            {!! Form::select('id_servico', \App\Models\Servico::orderBy('descricao')->pluck('descricao','id_servico')->toArray(), $agendamento->id_servico, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_executor', 'Executor:') !!}
            {!! Form::select('id_executor', \App\Models\Executor::orderBy('tipoExecutor')->pluck('tipoExecutor','id_executor')->toArray(), $agendamento->id_executor, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Agendamento', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}

@stop