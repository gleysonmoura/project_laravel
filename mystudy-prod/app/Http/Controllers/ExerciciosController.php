<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Disciplina;
use App\Models\Exercicio;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercicios = DB::table('exercicios as exer')
            ->join('atividades', 'atividades.id', '=', 'exer.atividade_id')
            ->join('assuntos as assu', 'assu.id', '=', 'atividades.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->select('exer.id', 'exer.*'/* , 'ati.*' */, 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('exer.created_at', 'desc')
            ->paginate(5);


        $atividades = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('ati.*', 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('ati.atividade_data', 'asc')
            ->paginate(5);

        $desempenhos = DB::table('desempenhos as des')
            ->join('exercicios as met', 'met.id', '=', 'des.exer_id')
            ->join('atividades as ati', 'ati.id', '=', 'met.atividade_id')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->select('des.*')
            ->get();

        $count_semana_exercicio = DB::table('exercicios as exer')
            ->join('atividades', 'atividades.id', '=', 'exer.atividade_id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->where('exer.created_at', '>=', date('Y/m/d', strtotime('-1 Monday')))
            ->count();

        $count_semana_exercicio_atrasada = DB::table('exercicios as exer')
            ->join('atividades', 'atividades.id', '=', 'exer.atividade_id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->where('exer.exer_status', '=', 'em andamento')
            ->where('exer.created_at', '<', date('Y/m/d'))
            ->count();

        $count_exercicio = DB::table('exercicios as exer')
            ->join('atividades', 'atividades.id', '=', 'exer.atividade_id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->count();

        $lista_disciplina = Disciplina::all();
        return view('pages.exercicio.index-exercicio', compact('exercicios', 'count_exercicio', 'lista_disciplina', 'desempenhos', 'count_semana_exercicio', 'count_semana_exercicio_atrasada'));
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

    public function store(Request $request)
    {
        $atividades = new Atividade();
        $atividades->plano_id = Session::get('id');
        $atividades->assunto_id = $request->campo_assunto;
        $atividades->atividade_tags = "realizar resolução de questões";
        $atividades->atividade_data = $request->data_atividade;
        $atividades->atividade_status = "pra estudo";
        $atividades->atividade_prioridade = "alta";
        $atividades->atividade_tempo = $request->data_atividade;
        $atividades->atividade_observacao = "realizar resolução de questões";
        $atividades->save();

        $meta_questao = new Exercicio();
        $meta_questao->atividade_id = $atividades->id;
        $meta_questao->exer_status = 'em andamento';
        $meta_questao->exer_quantidade = $request->quantidade_meta;

        $meta_questao->save();
        return back()->with('success', 'Exercicio de questões criada com sucesso!');
    }


    public function saveexer(Request $request, $id)
    {
        $meta_questao = new Exercicio();
        $meta_questao->atividade_id = $id;
        $meta_questao->exer_status = 'em andamento';
        $meta_questao->exer_quantidade = $request->quantidade_meta;

        $meta_questao->save();
        return back()->with('success', 'Exercicio de questões criada com sucesso!');
    }

    public function show($id)
    {
        $dados_exercicios = Exercicio::findOrFail($id);
        return view('pages.exercicio.index-finalizarexercicio', compact('dados_exercicios'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
