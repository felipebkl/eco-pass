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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $passaros = Passaro::get();

        return view('passaros.lista', array('passaros' => Passaro::all()));


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
        $result = DB::select("call busca_ini('$idPassaro')");


        $passarosel = DB::select("SELECT anilha ,nome, sexo, nomeCientifico, nomePopular, dataNasc FROM passaros, especies,sexos WHERE  idPassaro = $idPassaro  AND especie_idEspecie = idEspecie AND sexo_idsexo = idsexo");

        $i = 0;

        while ($i <= 14):
            if (empty($result[$i])) {
                $result[$i] = (object)array("nome" => " ", "parent" => 0, "idPassaro" => -1, "anilha" => "");

            }
            $i++;
        endwhile;


        return view('passaros.busca', array('result' => $result, 'passarosel' => $passarosel));
    }
}
