@extends('layouts.app')

@section('content')
    <div class="w3-main" style="margin-left:0px;margin-top:45px;">
        <div class="container">
            <div class="w3-main" style="margin-left:200px;margin-top:45px;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Espécies
                                <a class="pull-right" href="{{url('especies/novo')}}">Nova Espécie</a>
                            </div>

                            <div class="panel-body">
                                @if(Session::has('sucesso'))
                                    <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                                @endif
                                <table class="table">
                                    <th>ID</th>
                                    <th>Nome Científico</th>
                                    <th>Nome Popular</th>
                                    <th>Ações</th>
                                    <tbody>
                                    @foreach($especies as $especie)
                                        <tr>
                                            <td>{{$especie->idEspecie}}</td>
                                            <td>{{$especie->nomeCientifico}}</td>
                                            <td>{{$especie->nomePopular}}</td>
                                            <td>
                                                <a href="especies/{{$especie->idEspecie}}/editar"
                                                   class="btn btn-default">Editar</a>
                                                {!! Form::open(['method' => 'DELETE','url' => '/especies/'.$especie->idEspecie, 'style' => 'display: inline;'])!!}
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