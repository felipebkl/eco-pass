@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Preencha o formulário
                        <a class="pull-right" href="{{url('passaros')}}">Listagem de Pássaros</a>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('sucesso'))
                            <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                        @endif
                        @if(Request::is('*/editar'))
                            {!! Form::model($passaro,['method'=>'PATCH', 'url'=>'passaros/'.$passaro->idPassaro])!!}
                        @else
                            {!! Form::open(['url' => 'passaros/salvar']) !!}
                        @endif
                        {!! Form::hidden('users_id', Auth::user()->id) !!}
                        {!! Form::label('especie_idEspecie','Espécie') !!}
                        {!! Form::select('especie_idEspecie', array_pluck(\App\Especie::all(), 'nomeCientifico', 'idEspecie'),null,['class'=>'form-control','placeholder' => 'Espécie'])!!}
                        {!! Form::label('sexo_idsexo','Sexo') !!}
                        {!! Form::select('sexo_idsexo', array_pluck(\App\Sexo::all(), 'sexo', 'idsexo'),null,['class'=>'form-control','placeholder' => 'Sexo'])!!}
                        {!! Form::label('anilha','Anilha') !!}
                        {!! Form::input('text','anilha',null,['class' => 'form-control','autofocus','placeholder' => 'Anilha']) !!}
                        {!! Form::label('nome','Nome') !!}
                        {!! Form::input('text','nome',null,['class' => 'form-control','placeholder' => 'Nome']) !!}
                        {!! Form::label('dataNasc','Data de Nascimento') !!}
                        {!! Form::date('dataNasc', \Carbon\Carbon::now(), ['class'=>'form-control'])!!}
                        {!! Form::label('idPai','ID PAI') !!}
                        {!! Form::input('text','idPai',null,['class' => 'form-control','placeholder' => 'ID Pai']) !!}
                        {!! Form::label('idMae','ID MAE') !!}
                        {!! Form::input('text','idMae',null,['class' => 'form-control','placeholder' => 'ID Mae']) !!}
                        {!! Form::hidden('status', '1') !!}
                        <br>
                        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection