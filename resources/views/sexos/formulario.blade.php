@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Preencha o formulário
                        <a class="pull-right" href="{{url('sexos')}}">Listagem dos Sexos</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('sucesso'))
                            <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($sexo,['method'=>'PATCH', 'url'=>'sexos/'.$sexo->idsexo])!!}
                        @else
                            {!! Form::open(['url' => 'sexos/salvar']) !!}
                        @endif


                        {!! Form::label('sexo','Sexo') !!}

                        {!! Form::input('text','sexo',null,['class' => 'form-control','autofocus','placeholder' => 'Sexo']) !!}
                        <br>
                        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection