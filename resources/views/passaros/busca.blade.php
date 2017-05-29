<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="{{ asset('perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/Treant.css') }}">


<style>
    html, body, h1, h2, h3, h4, h5, h6 {
        font-family: "Roboto", sans-serif
    }

    /*Now the CSS*/
    .chart {
        height: 60%;
        width: 100%;
        margin: 5px;
        margin: 15px auto;
    }

    .tennis-draw {
        font-family: Arial;
        font-size: 12px;
        width: 20%;
        height: 60px;

    }

    .tennis-draw.winner {
        height: 38px;
    }



    .tennis-draw.winner .node-name {
        padding-left: 30px;
        margin-top: 0px;
        display: block;
    }

    .tennis-draw .node-name {
        padding-left: 25px;
        margin-top: 13px;
        white-space: pre;
        color: navy;
    }

    .tennis-draw .node-desc {

        margin-top: -1px;
        padding-left: 25px;
        color: #999;
    }

    .tennis-draw.first-draw .node-title,
    .tennis-draw.first-draw .node-name,
    .tennis-draw.first-draw img {
        position: absolute;
        top: 8px;
    }

    .tennis-draw.first-draw:hover img {
        width: 120px;
        top: -12px;
    }

    .tennis-draw.first-draw {
        width: 165px;
        height: 20px;
    }

    .tennis-draw.first-draw img {
        margin: 3px 4px 0 0;
        left: 25px;
    }

    .tennis-draw.first-draw .node-title {
        margin-top: 3px;
    }

    .tennis-draw.first-draw .node-name {
        width: 2px;
        padding-left: 50px;
    }

    .tennis-draw.first-draw.bye .node-name {
        color: #999;
    }



</style>
@extends('layouts.app')
@section('content')

    <div class="w3-main" style="margin-left:220px;margin-top:45px;">
        @foreach($passarosel as $passaro)
        <header class="w3-container" style="padding-top:15px">
            <h1><b> {{$passaro->nomePopular}}</b></h1>
        </header>

        <!-- Page Container -->
        <div class="w3-content w3-margin-top" style="max-width:1400px;">

            <!-- The Grid -->
            <div class="w3-row-padding">

                <!-- Left Column -->
                <div class="w3-quarter">


                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            <img src="http://www.ocoleiro.com/trincaferro/wp-content/uploads/2014/12/trinca-1.jpg"
                                 style="width:100%" alt="Avatar">
                        </div>
                        <div class="w3-container" style="padding-top:15px">
                            <p>
                                <i class="fa fa-heartbeat fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$passaro->nome}}
                            </p>
                            <p>
                                <i class="fa fa-venus-mars  fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$passaro->sexo}}
                            </p>
                            <p>
                                <i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$passaro->dataNasc}}
                            </p>
                            <p>
                                <i class="fa fa-address-card-o fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$passaro->anilha}}
                            </p>
                            <hr>

                            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Observações</b>
                            </p>
                            <div class="w3-container">
                                <p align="justify">Nunca é demais lembrar o peso e o significado destes problemas, uma
                                    vez que a mobilidade dos capitais internacionais aponta para a melhoria das diversas
                                    correntes de pensamento. O incentivo ao avanço tecnológico, assim como a expansão
                                    dos mercados mundiais exige a precisão e a definição das formas de ação. Assim
                                    mesmo, a determinação clara de objetivos acarreta um processo de reformulação e
                                    modernização de alternativas às soluções ortodoxas. </p>
                            </div>


                            <br>
                        </div>
                    </div>
                    <br>

                    <!-- End Left Column -->
                </div>


                <!-- Right Column -->
                <div class="w3-threequarter">

                    <div class="w3-container w3-card-2 w3-white w3-margin-bottom">

                        <h2 class="w3-text-grey w3-padding-16"><i
                                    class="fa fa-tree fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Árvore
                            Genealógica </h2>

                        <div class="w3-container" style="display: block">
                            <div class="w3-row-padding" style=" height: auto">
                                <div class="w3-content">


                                    <div class="chart" id="OrganiseChart6" style=" overflow:hidden; height: 570px"
                                         ;></div>

                                    <script src="{{ asset('js/example7.js') }}"></script>
                                    <script src="{{ asset('js/raphael.js') }}"></script>
                                    <script src="{{ asset('js/Treant.js') }}"></script>
                                    <script src="{{ asset('js/jquery.min.js') }}"></script>
                                    <script src="{{ asset('js/mousewheel.js') }}"></script>
                                    <script src="{{ asset('js/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
                                    <script>
                                        var tree_structure = {
                                            chart: {
                                                container: "#OrganiseChart6",
                                                levelSeparation: 38,
                                                siblingSeparation: 1,
                                                subTeeSeparation: 2,
                                                scrollbar: "fancy",
                                                rootOrientation: "WEST",
                                                node: {
                                                    HTMLclass: "tennis-draw",
                                                    drawLineThrough: true
                                                },
                                                connectors: {
                                                    type: "straight",
                                                    style: {
                                                        "stroke-width": 3,
                                                        "stroke": "#ccc"
                                                    }
                                                }
                                            },
                                            @foreach($pais as $pai)
                                            nodeStructure: {
                                                text: {
                                                    name: '<?php echo $pai->filho; ?>'

                                                },
                                                HTMLclass: "winner",
                                                children: [
                                                    {
                                                        text: {
                                                            name: '<?php echo $pai->pai; ?>',
                                                            desc: '<?php echo $pai->anilha_pai; ?>'
                                                        },
                                                        @foreach($pvos as $pvo)
                                                        children: [
                                                            {
                                                                text: {
                                                                    name: '<?php echo $pvo->pai; ?>',
                                                                    desc: '<?php echo $pvo->anilha_pai; ?>'
                                                                },
                                                                @foreach($ppvos as $ppvo)
                                                                children: [
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $ppvo->pai; ?>',
                                                                            desc: '<?php echo $ppvo->anilha_pai; ?>'
                                                                        }

                                                                    },
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $ppvo->mae; ?>',
                                                                            desc: '<?php echo $ppvo->anilha_mae; ?>'
                                                                        }

                                                                    }
                                                                ]@endforeach
                                                            },
                                                            {
                                                                text: {
                                                                    name: '<?php echo $pvo->mae; ?>',
                                                                    desc: '<?php echo $pvo->anilha_mae; ?>'
                                                                },
                                                                @foreach($mpvos as $mpvo)
                                                                children: [
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $mpvo->pai; ?>',
                                                                            desc: '<?php echo $mpvo->anilha_pai; ?>'
                                                                        }

                                                                    },
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $mpvo->pai; ?>',
                                                                            desc: '<?php echo $mpvo->anilha_pai; ?>'
                                                                        }
                                                                    }
                                                                ]
                                                                @endforeach
                                                            }
                                                        ]
                                                        @endforeach
                                                    },
                                                    {
                                                        text: {
                                                            name: '<?php echo $pai->mae; ?>',
                                                            desc: '<?php echo $pai->anilha_mae; ?>'
                                                        },
                                                        @foreach( $mvos as $mvo)
                                                        children: [
                                                            {
                                                                text: {
                                                                    name: '<?php echo $mvo->pai; ?>',
                                                                    desc: '<?php echo $mvo->anilha_pai; ?>'
                                                                },
                                                                @foreach( $pmvos as $pmvo)
                                                                children: [
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $pmvo->pai; ?>',
                                                                            desc: '<?php echo $pmvo->anilha_pai; ?>'
                                                                        }

                                                                    },
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $pmvo->mae; ?>',
                                                                            desc: '<?php echo $pmvo->anilha_mae; ?>'
                                                                        }

                                                                    }
                                                                ]
                                                                @endforeach
                                                            },
                                                            {
                                                                text: {
                                                                    name: '<?php echo $mvo->mae; ?>',
                                                                    desc: '<?php echo $mvo->anilha_mae; ?>'
                                                                },
                                                                @foreach($mmvos as $mmvo)
                                                                children: [
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $mmvo->pai; ?>',
                                                                            desc: '<?php echo $mmvo->anilha_pai; ?>'
                                                                        }

                                                                    },
                                                                    {
                                                                        text: {
                                                                            name: '<?php echo $pmvo->mae; ?>',
                                                                            desc: '<?php echo $pmvo->anilha_mae; ?>'
                                                                        }
                                                                    }
                                                                ]
                                                                @endforeach
                                                            }
                                                        ]
                                                        @endforeach
                                                    }
                                                ]
                                            }
                                            @endforeach
                                        };
                                        new Treant(tree_structure);
                                    </script>
                                </div>
                            </div>
                            <!-- End Page Container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection