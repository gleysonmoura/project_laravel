<?php

namespace App\Http\Controllers;

use App\Models\Desempenho;
use App\Models\Exercicio;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DesempenhoController extends Controller
{
    public function index()
    {
        $desempenho = DB::table('desempenhos')
            ->get();

        $desempenhos = DB::table('desempenhos as des')
            ->join('exercicios as e', 'des.exer_id', '=', 'e.id')
            ->join('atividades', 'atividades.id', '=', 'e.atividade_id')
            ->join('assuntos', 'atividades.assunto_id', '=', 'assuntos.id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            /* ->select('des.*', 'atividades.*') */
            ->get();

        return view('pages.desempenhos.index-desempenho', compact('desempenhos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    /*     public function finalizar(Request $request, $id)
    {
        $desempenho = new Desempenho();

        $desempenho->exer_id = $id;
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
    } */

    public function finalizarexercicio(Request $request, $id)
    {
        $desempenho = new Desempenho();

        $desempenho->exer_id = $id;
        $desempenho->desempenho_quantidade = $request->quantidade_questoes;
        $desempenho->desempenho_certas = $request->questoes_certas;
        $desempenho->desempenho_erradas = $request->questoes_erradas;
        $desempenho->desempenho_porcentagem = $request->desempenho;

        $meta_questao = Exercicio::findOrFail($id);
        $meta_questao->atividade_id = $meta_questao->atividade_id;
        $meta_questao->exer_status = 'finalizada';
        $meta_questao->exer_quantidade = $meta_questao->exer_quantidade;


        $desempenho->save();
        $meta_questao->save();
        return redirect()->route('exercicio.index')->with('success', 'Exercicio finalizada com sucesso!');
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
