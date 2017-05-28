@extends('layouts.app')

@section('content')
    <div class="w3-main" style="margin-center:0px;margin-top:45px;">
        <div class="container">
            <div class="w3-main" style="margin-left:200px;margin-top:45px;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Preencha o formulário
                                <a class="pull-right" href="{{url('especies')}}">Listagem de Espécies</a>
                            </div>

                            <div class="panel-body">
                                @if(Session::has('sucesso'))
                                    <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                                @endif

                                @if(Request::is('*/editar'))
                                    {!! Form::model($especie,['method'=>'PATCH', 'url'=>'especies/'.$especie->idEspecie])!!}
                                @else
                                    {!! Form::open(['url' => 'especies/salvar']) !!}
                                @endif


                                {!! Form::label('nomeCientifico','Nome Científico') !!}

                                {!! Form::input('text','nomeCientifico',null,['class' => 'form-control','autofocus','placeholder' => 'Nome Cientifico']) !!}

                                {!! Form::label('nomePopular','Nome Popular') !!}
                                {!! Form::input('text','nomePopular',null,['class' => 'form-control','placeholder' => 'Nome Popular']) !!}
                                <br>
                                {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection