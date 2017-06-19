@extends('layouts.app')

<link href="{{ asset('js/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('js/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
@section('content')
    <div class="w3-main" style="margin-center:0px;margin-top:45px;">
        <div class="container">
            <div class="w3-main" style="margin-right:100px;margin-top:60px;">
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
                                <table width="100%" class="table table-striped table-bordered table-hover"
                                       id="dataTables-example">
                                    <thead>
                                    <tr>
                                    <th>Nome Científico</th>
                                    <th>Nome Popular</th>
                                    <th>Anilha</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($passaros as $passaro)
                                        <tr>
                                            <td>{{$passaro->especie->nomeCientifico}}</td>
                                            <td>{{$passaro->especie->   nomePopular}}</td>
                                            <td>{{$passaro->anilha}}</td>
                                            <td>{{$passaro->nome}}</td>
                                            <td>
                                                <a href="passaros/{{$passaro->idPassaro}}/editar"
                                                   class="btn btn-default">Editar</a>
                                                <a href="passaros/{{$passaro->idPassaro}}/busca"
                                                   class="btn btn-default">Visualizar</a>
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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection

