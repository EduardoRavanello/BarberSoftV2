@extends('adminlte::page')

@section('content')
    <h3>Novo Executor</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'executor.store']) !!}
        <div class="form-group">
            {!! Form::label('tipoExecutor', 'Tipo de Executor:') !!}
            {!! Form::text('tipoExecutor', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_especialidade', 'Especialidade:') !!}
            {!! Form::select('id_especialidade', \App\Models\Especialidade::orderBy('descricao')->pluck('descricao','id_especialidade')->toArray(), 'Escolher', ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Executor', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop