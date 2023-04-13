<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anotacao as RequestsAnotacao;
use App\Http\Requests\CreateAnotacao;
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
    public function index()
    {
        $notas = Anotacao::all();
        return view('pages.anotacao.anotacao-index', compact('notas'));
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
        return view('pages.anotacao.storeanotacao', compact('notas', 'atividadeshow'));
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
    public function storeanotacao(CreateAnotacao $request, $id)
    {

        $notas = new Anotacao();
        $notas->titulo_anotacao = $request->titulo_anotacao;
        $notas->texto_anotacao = $request->descricao_anotacao;
        $notas->assunto_id = $id;
        $notas->plano_id = Session::get('id');;

        $notas->save();

        return back()->with('success', 'Anotação cadastrada com sucesso!');
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
