<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anotacao as RequestsAnotacao;
use App\Models\Anotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $notas = Anotacao::all();
        return view('pages.anotacao.index-nota', compact('notas'));
    }

    public function addnotas($id)
    {
        $atividadeshow = DB::table('atividades as ati')
            ->where('ati.id', '=', $id)
            ->where('ati.plano_id', '=', Session::get('id'))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->select('ati.id', 'ati.plano_id', 'assu.*')
            ->get();

        $notas = Anotacao::all();
        return view('pages.anotacao.index-nota', compact('notas', 'atividadeshow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeanotacao(RequestsAnotacao $request, $id)
    {

        $notas = new Anotacao();
        $notas->titulo_anotacao = $request->titulo_anotacao;
        $notas->texto_anotacaco = $request->texto_anotacaco;
        $notas->assunto_id = $id;
        $notas->plano_id = Session::get('id');;

        $notas->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
