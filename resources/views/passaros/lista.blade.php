@extends('layouts.app')

@section('content')
    <div class="w3-main" style="margin-center:0px;margin-top:45px;">
        <div class="container">
            <div class="w3-main" style="margin-left:2px;margin-top:15px;">
                <div class="row">
                    <div class="col-md-11 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Pássaros
                                <a class="pull-right" href="{{url('passaros/novo')}}">Novo Pássaro</a>
                            </div>

                            <div class="panel-body">
                                @if(Session::has('sucesso'))
                                    <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                                @endif
                                <table class="table">
                                    <th>ID</th>
                                    <th>Nome Científico</th>
                                    <th>Nome Popular</th>
                                    <th>Anilha</th>
                                    <th>Nome</th>
                                    <th>Sexo</th>
                                    <th>Data Nasc Popular</th>
                                    <th>ID Pai</th>
                                    <th>ID Mãe</th>
                                    <th>Ações</th>
                                    <tbody>
                                    @foreach($passaros as $passaro)
                                        <tr>
                                            <td>{{$passaro->idPassaro}}</td>
                                            <td>{{$passaro->especie->nomeCientifico}}</td>
                                            <td>{{$passaro->especie->nomePopular}}</td>
                                            <td>{{$passaro->anilha}}</td>
                                            <td>{{$passaro->nome}}</td>
                                            <td>{{$passaro->sexo->sexo}}</td>
                                            <td>{{$passaro->dataNasc}}</td>
                                            <td>{{$passaro->idPai}}</td>
                                            <td>{{$passaro->idMae}}</td>
                                            <td>
                                                <a href="passaros/{{$passaro->idPassaro}}/editar"
                                                   class="btn btn-default">Editar</a>
                                                {!! Form::open(['method' => 'DELETE','url' => '/passaros/'.$passaro->idPassaro, 'style' => 'display: inline;'])!!}
                                                <button type="submit" class="btn btn-default">Excluir</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

