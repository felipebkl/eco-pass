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

    public function buscarPassaro()
    {
        $idPassarop = 15;
        $pais = DB::select("SELECT f.idPassaro as id_filho, f.nome as filho,p.idPassaro as id_pai, p.nome as pai, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                   WHERE  f.idPassaro = $idPassarop  and f.idPai=p.idPassaro and f.idMae=m.idPassaro");
        if (!empty($pais)) {
            foreach ($pais as $pai) {

                $pvos = DB::select("SELECT p.idPassaro as id_pai, p.nome as pai, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                   WHERE  f.idPassaro = $pai->id_pai and f.idPai=p.idPassaro and f.idMae=m.idPassaro");

                $mvos = DB::select("SELECT p.idPassaro as id_pai, p.nome as pai, m.idPassaro as id_mae, m.nome as mae
                                   FROM `passaros` as f,`passaros` as p, `passaros` as m
                                 WHERE  f.idPassaro = $pai->id_mae and f.idPai=p.idPassaro and f.idMae=m.idPassaro");

            }
        }
        elseif (empty($pais)) {
            $object = new stdClass();
            $pais[] = (object) array("id_filho" => "N/A", "filho" => "N/A","id_pai" => "N/A", "pai" => "N/A", "id_mae" => "N/A", "mae" => "N/A");
            $pvos[] = (object) array("id_filho" => "N/A", "filho" => "N/A","id_pai" => "N/A", "pai" => "N/A", "id_mae" => "N/A", "mae" => "N/A");
            $mvos[] = (object) array("id_filho" => "N/A", "filho" => "N/A","id_pai" => "N/A", "pai" => "N/A", "id_mae" => "N/A", "mae" => "N/A");

        }

        return view('passaros.busca', array('pais' => $pais,'pvos' => $pvos,'mvos' => $mvos));

    }
}
