<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;
use App\Http\Controllers\Controller;

class EspeciesController extends Controller
{
    public function index()
    {
        $especies = Especie::get();
        return view('especies.lista',['especies'=>$especies]);

    }

    public function novo()
    {
        return view('especies.formulario');

    }

    public function salvar(Request $request)
    {
        $especie = new Especie();
    //var_dump($request);
        $especie = $especie->create($request->all());
        \Session::flash('sucesso','Espécie cadastrada com sucesso!');
        return \Redirect::to('especies/novo');

    }
    public function editar($idEspecie)
    {
        $especie = Especie::findOrFail($idEspecie);
        return view('especies.formulario',['especie'=>$especie]);

    }
    public function atualizar($idEspecie,Request $request)
    {
        $especie = Especie::findOrFail($idEspecie);
        $especie->update($request->all());
        \Session::flash('sucesso','Espécie atualizada com sucesso!');
        return \Redirect::to('especies/'.$especie->idEspecie.'/editar');
    }
    public function deletar($idEspecie)
    {
        $especie = Especie::findOrFail($idEspecie);

        $especie->delete();
        \Session::flash('sucesso','Espécie Deletada com sucesso!');
        return \Redirect::to('especies');

    }

}
