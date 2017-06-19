<?php

namespace App\Http\Controllers;

use App\Sexo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;
use App\Http\Controllers\Controller;

class SexosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sexos = Sexo::get();
        return view('sexos.lista', ['sexos' => $sexos]);

    }

    public function novo()
    {
        return view('sexos.formulario');

    }

    public function salvar(Request $request)
    {
        $sexo = new Sexo();
        //var_dump($request);
        $sexo = $sexo->create($request->all());
        \Session::flash('sucesso', 'Sexo cadastrado com sucesso!');
        return \Redirect::to('sexos/novo');

    }

    public function editar($idsexo)
    {
        $sexo = Sexo::findOrFail($idsexo);
        return view('sexos.formulario', ['sexo' => $sexo]);

    }

    public function atualizar($idsexo, Request $request)
    {
        $sexo = Sexo::findOrFail($idsexo);
        $sexo->update($request->all());
        \Session::flash('sucesso', 'Sexo atualizado com sucesso!');
        return \Redirect::to('sexos/' . $sexo->idsexo . '/editar');
    }

    public function deletar($idsexo)
    {
        $sexo = Sexo::findOrFail($idsexo);

        $sexo->delete();
        \Session::flash('sucesso', 'Espécie Deletada com sucesso!');
        return \Redirect::to('sexos');

    }

}
