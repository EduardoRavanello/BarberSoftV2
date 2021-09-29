@extends('adminlte::page')

@section('content')
    <h3>Novo Usuário</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'usuario.store']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('user', 'Usuário:') !!}
            {!! Form::text('user', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('senha', 'Senha:') !!}
            {!! Form::text('senha', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::text('telefone', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_executor', 'Executor:') !!}
            {!! Form::select('id_executor', \App\Models\Executor::orderBy('tipoExecutor')->pluck('tipoExecutor','id_executor')->toArray(), 'Escolher', ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Usuário', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}

@stop