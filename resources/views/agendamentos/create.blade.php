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
            {!! Form::label('data', 'Data:') !!}
            {!! Form::date('data', null, ['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('hora', 'Hora:') !!}
            {!! Form::time('hora', null, ['class'=>'form-control','required']) !!}
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

@section('js')
    <script>
        $(document).ready(function(){
            var add_button = $(".add_field_button");
            var wrapper = $(".input_fields_wrap");
            var x=0;
             
            $(add_button).click(function(e){
                x++;
                var newField = '<div><div style="width:74%; float:left" id="id_produto">{!! Form::select("produtosAgendamento[]", \App\Models\Produto::orderBy("descricao")->pluck("descricao", "id_produto")->toArray(), null, ["class"=>"form-control", "required"=>"true", "placeholder"=>"Selecione Produto"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle">Remover</button></div>';
                $(wrapper).append(newField);
            });

            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
    </script>

@stop