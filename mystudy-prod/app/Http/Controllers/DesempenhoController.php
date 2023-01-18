<?php

namespace App\Http\Controllers;

use App\Models\Desempenho;
use App\Models\Meta;
use Illuminate\Http\Request;

class DesempenhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function finalizar(Request $request, $id)
    {
        $desempenho = new Desempenho();

        $desempenho->meta_id = $id;
        $desempenho->desempenho_quantidade = $request->quantidade_questoes;
        $desempenho->desempenho_certas = $request->questoes_certas;
        $desempenho->desempenho_erradas = $request->questoes_erradas;
        $desempenho->desempenho_porcentagem = $request->desempenho;

        $ide_meta = $request->id_meta;

        $meta_questao = Meta::findOrFail($id);
        $meta_questao->atividade_id = $meta_questao->atividade_id;
        $meta_questao->meta_status = 'finalizada';
        $meta_questao->meta_quantidade = $meta_questao->meta_quantidade;


        $desempenho->save();
        $meta_questao->save();
        return redirect()->route('metaquestao.index')->with('success', 'Meta finalizada com sucesso!');
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
