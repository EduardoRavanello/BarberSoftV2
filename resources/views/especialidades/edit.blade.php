@extends('adminlte::page')

@section('content')
    <h3>Editando Especialidade: {{ $especialidade->descricao }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["especialidade.update", 'id'=>$especialidade->id_especialidade], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $especialidade->descricao, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Especialidade', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop