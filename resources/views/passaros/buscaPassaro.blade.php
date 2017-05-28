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
        font-size: 12px;
        width: 15%;
        height: -100%;

    }

    .tennis-draw.winner {
        height: 38px;
    }

    .tennis-draw.winner:hover {
        background: url('trophy.png') right 0 no-repeat;
    }

    .tennis-draw.winner .node-name {
        padding-left: 10px;
        margin-top: 1px;
        display: block;
    }

    .tennis-draw .node-name {
        padding: 2px;
        white-space: pre;
        color: #00AFF0;
    }

    .tennis-draw .node-desc {
        padding: 1px;
        color: #999;
    }

    .tennis-draw.first-draw .node-title,
    .tennis-draw.first-draw .node-name,
    .tennis-draw.first-draw img {
        position: absolute;
        top: -8px;
    }

    .tennis-draw.first-draw:hover img {
        width: 20px;
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
        <header class="w3-container" style="padding-top:15px">
            <h1><b> Trinca Ferro</b></h1>
        </header>

        <!-- Page Container -->
        <div class="w3-content w3-margin-top" style="max-width:1400px;">

            <!-- The Grid -->
            <div class="w3-row-padding">

                <!-- Left Column -->
                <div class="w3-third">


                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            <img src="http://www.ocoleiro.com/trincaferro/wp-content/uploads/2014/12/trinca-1.jpg"
                                 style="width:100%" alt="Avatar">
                        </div>
                        <div class="w3-container" style="padding-top:15px">
                            <p><i class="fa fa-heartbeat fa-fw w3-margin-right w3-large w3-text-teal"></i>TROVÃO</p>
                            <p><i class="fa fa-venus-mars  fa-fw w3-margin-right w3-large w3-text-teal"></i>Macho</p>
                            <p><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-teal"></i>25/10/16</p>
                            <p><i class="fa fa-address-card-o fa-fw w3-margin-right w3-large w3-text-teal"></i>PRA 023
                                2,5</p>
                            <hr>

                            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b>
                            </p>
                            <p>Adobe Photoshop</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
                            </div>
                            <p>Photography</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
                                    <div class="w3-center w3-text-white">80%</div>
                                </div>
                            </div>
                            <p>Illustrator</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
                            </div>
                            <p>Media</p>
                            <div class="w3-light-grey w3-round-xlarge w3-small">
                                <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-twothird">

                    <div class="w3-container w3-card-2 w3-white w3-margin-bottom">

                        <h2 class="w3-text-grey w3-padding-16"><i
                                    class="fa fa-tree fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Árvore
                            Genealógica</h2>

                        <div class="w3-container" style="display: block">
                            <div class="w3-row-padding" style=" height: auto">
                                <div class="col-sm-12">
                                    @foreach($passaros as $passaro)

                                        <div class="chart" id="OrganiseChart6" style=" overflow: overlay; height: 570px"
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
                                                    siblingSeparation: 3,
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
                                                nodeStructure: {
                                                    text: {
                                                        name: '<?php echo $passaro->idPassaro; ?>'

                                                    },
                                                    HTMLclass: "winner",
                                                    children: [
                                                        {
                                                            text: {
                                                                name: "PAI",
                                                                desc: "PRA 122"
                                                            },
                                                            children: [
                                                                {
                                                                    text: {
                                                                        name: "VÔ",
                                                                        desc: "PRA 364"
                                                                    },
                                                                    children: [
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÔ",
                                                                                desc: "PRA 542"
                                                                            }

                                                                        },
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÓ",
                                                                                desc: "PRA 372"
                                                                            }

                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    text: {
                                                                        name: "VÓ",
                                                                        desc: "PRA 763"
                                                                    },
                                                                    children: [
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÔ",
                                                                                desc: "PRA 765"
                                                                            }

                                                                        },
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÓ",
                                                                                desc: "PRA 563"
                                                                            }
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            text: {
                                                                name: "MÃE",
                                                                desc: "PRA 022"
                                                            },
                                                            children: [
                                                                {
                                                                    text: {
                                                                        name: "VÔ",
                                                                        desc: "PRA 332"
                                                                    },
                                                                    children: [
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÔ",
                                                                                desc: "PRA 102"
                                                                            }

                                                                        },
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÓ",
                                                                                desc: "PRA 232"
                                                                            }

                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    text: {
                                                                        name: "VÓ",
                                                                        desc: "PRA 443"
                                                                    },
                                                                    children: [
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÔ",
                                                                                desc: "PRA 323"
                                                                            }

                                                                        },
                                                                        {
                                                                            text: {
                                                                                name: "BISAVÓ",
                                                                                desc: "PRA 003"
                                                                            }
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                }
                                            };


                                            new Treant(tree_structure);

                                        </script>
                                    @endforeach
                                </div>
                            </div>


                            <!-- End Page Container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection