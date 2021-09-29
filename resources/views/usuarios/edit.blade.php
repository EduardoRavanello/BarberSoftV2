@extends('adminlte::page')

@section('content')
    <h3>Editando Usuário: {{ $usuario->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["usuario.update", 'id'=>$usuario->id_usuario], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $usuario->nome, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('user', 'Usuário:') !!}
            {!! Form::text('user', $usuario->user, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('senha', 'Senha:') !!}
            {!! Form::text('senha', $usuario->senha, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::text('telefone', $usuario->telefone, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('id_executor', 'Executor:') !!}
            {!! Form::select('id_executor', \App\Models\Executor::orderBy('tipoExecutor')->pluck('tipoExecutor','id_executor')->toArray(), $usuario->id_executor, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Usuário', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}

@stop