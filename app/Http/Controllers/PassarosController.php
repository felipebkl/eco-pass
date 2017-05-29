<?php

namespace App\Http\Controllers;

use App\Passaro;
use App\Sexo;
use App\Especie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;
use App\Http\Controllers\Controller;
use stdClass;

class PassarosController extends Controller
{

    public function index()
    {
        //$passaros = Passaro::get();

        return view('passaros.lista', array('passaros' => Passaro::all()));


    }

    public function buscar()
    {
        return view('passaros.buscaPassaro');
    }

    public function novo()
    {
        return view('passaros.formulario');

    }

    public function salvar(Request $request)
    {
        $passaro = new Passaro();

        $passaro = $passaro->create($request->all());
        \Session::flash('sucesso', 'Passaro cadastrado com sucesso!');
        return \Redirect::to('passaros/novo');

    }

    public function editar($idPassaro)
    {
        $passaro = Passaro::findOrFail($idPassaro);
        return view('passaros.formulario', ['passaro' => $passaro]);

    }

    public function atualizar($idPassaro, Request $request)
    {
        $passaro = Passaro::findOrFail($idPassaro);
        $passaro->update($request->all());
        \Session::flash('sucesso', 'Pássaro atualizado com sucesso!');
        return \Redirect::to('passaros/' . $passaro->idPassaro . '/editar');
    }

    public function deletar($idPassaro)
    {
        $passaro = Passaro::findOrFail($idPassaro);

        $passaro->delete();
        \Session::flash('sucesso', 'Pássaro deletado com sucesso!');
        return \Redirect::to('passaros');

    }


    public function buscarPassaro($idPassaro)
    {
        $object = new stdClass();
        $vazio[] = (object)array("anilha_filho" => " ", "filho" => "N/A", "anilha_pai" => " ", "pai" => "N/A", "anilha_mae" => " ", "mae" => "N/A");

        $passarosel = DB::select("SELECT anilha ,nome, sexo, nomeCientifico, nomePopular, dataNasc FROM passaros, especies,sexos WHERE  idPassaro = 15  AND especie_idEspecie = idEspecie AND sexo_idsexo = idsexo");


        $pais = DB::select("SELECT f.anilha as anilha_filho, f.idPassaro as id_filho, f.nome as filho,p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                   WHERE  f.idPassaro = $idPassaro  and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
        if (!empty($pais)) {
            foreach ($pais as $pai) {
                $pvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                           FROM `passaros` as f,`passaros` as p, `passaros` as m
                                           WHERE  f.idPassaro = $pai->id_pai and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                if (!empty($pvos)) {
                    foreach ($pvos as $pvo) {
                        $ppvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                   WHERE  f.idPassaro = $pvo->id_pai and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                        if (empty($ppvos)) {
                            $ppvos = $vazio;
                        }

                        $mpvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                 WHERE  f.idPassaro = $pvo->id_mae and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                        if (empty($mpvos)) {

                            $mpvos = $vazio;
                        }
                    }
                } elseif (empty($pvos)) {
                    $pvos = $vazio;
                    $mpvos = $vazio;
                    $ppvos = $vazio;
                }

                $mvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                           FROM `passaros` as f,`passaros` as p, `passaros` as m
                                           WHERE  f.idPassaro = $pai->id_mae and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                if (!empty($mvos)) {
                    foreach ($mvos as $mvo) {
                        $pmvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                   WHERE  f.idPassaro = $mvo->id_pai and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                        if (empty($pmvos)) {
                            $pmvos = $vazio;
                        }

                        $mmvos = DB::select("SELECT p.anilha as anilha_pai, p.idPassaro as id_pai, p.nome as pai, m.anilha as anilha_mae, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                 WHERE  f.idPassaro = $mvo->id_mae and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
                        if (empty($mmvos)) {
                            $mmvos = $vazio;
                        }
                    }
                } elseif (empty($mvos)) {
                    $mvos = $vazio;
                    $pmvos = $vazio;
                    $mmvos = $vazio;
                }
            }
        } elseif (empty($pais)) {
            $pais = $vazio;
            $pvos = $vazio;
            $mvos = $vazio;
            $ppvos = $vazio;
            $mpvos = $vazio;
            $pmvos = $vazio;
            $mmvos = $vazio;

        }
        return view('passaros.busca', array('passarosel' => $passarosel, 'pais' => $pais, 'pvos' => $pvos, 'mvos' => $mvos, 'ppvos' => $ppvos, 'mpvos' => $mpvos, 'pmvos' => $pmvos, 'mmvos' => $mmvos));
    }
}
