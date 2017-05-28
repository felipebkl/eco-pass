@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sexo
                        <a class="pull-right" href="{{url('sexos/novo')}}">Novo Sexo</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('sucesso'))
                            <div class="alert alert-success">{{Session::get('sucesso')}}</div>
                        @endif
                        <table class="table">
                            <th>ID</th>
                            <th>Sexo</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach($sexos as $sexo)
                                <tr>
                                    <td>{{$sexo->idsexo}}</td>
                                    <td>{{$sexo->sexo}}</td>
                                    <td>
                                        <a href="sexos/{{$sexo->idsexo}}/editar"
                                           class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE','url' => '/sexos/'.$sexo->idsexo, 'style' => 'display: inline;'])!!}
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
@endsection