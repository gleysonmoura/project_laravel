<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Desempenho;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AtividadesController extends Controller
{
    public function index()
    {
        $atividades = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('ati.*', 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('ati.atividade_data', 'asc')
            ->paginate(5);

        $count_atividade_abertas = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_data', '>', date('Y/m/d'))
            ->where('ati.atividade_status', '!=', 'finalizado')
            ->count();
        $count_atividade_atrasadas = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_data', '<', date('Y/m/d'))
            ->where('ati.atividade_status', '!=', 'finalizado')
            ->count();
        $count_atividade = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_status', '!=', 'finalizado')
            ->count();

        $exercicio = DB::table('exercicios as exer')
            /*   ->join('atividades as ati', 'ati.id', '=', 'exer.atividade_id') */
            ->get();

        return view('pages.atividades.atividade-index', compact('atividades', 'count_atividade_abertas', 'count_atividade', 'count_atividade_atrasadas'));
    }

    public function create()
    {
        $lista_disciplina = Disciplina::all();
        return view('pages.atividades.atividade-create', compact('lista_disciplina',));
    }

    public function store(Request $request)
    {
        $atividades = new Atividade();
        $atividades->plano_id = Session::get('id');
        $atividades->assunto_id = $request->campo_assunto;
        $atividades->atividade_tags = implode(',', $request->input('tags'));
        $atividades->atividade_data = $request->data_atividade;
        $atividades->atividade_status = $request->status_atividade;
        $atividades->atividade_prioridade = $request->prioridade_atividade;
        $data = $request->data_atividade;
        if ($request->tempo_atividade == 1) {
            $atividades->atividade_tempo = date('Y-m-d', strtotime($request->data_atividade . '+1 day'));
        } else {
            if ($request->tempo_atividade == 3) {
                $atividades->atividade_tempo = date('Y-m-d', strtotime($request->data_atividade . '+3 day'));
            } else {
                if ($request->tempo_atividade == 5) {
                    $atividades->atividade_tempo = date('Y-m-d', strtotime($request->data_atividade . '+5 day'));
                } else {
                    $atividades->atividade_tempo = date('Y-m-d', strtotime($request->data_atividade . '+7 day'));
                }
            }
        }
        $atividades->atividade_observacao = $request->observacao_atividade;
        $atividades->save();
        return redirect()->route('atividade.index')->with('success', 'Atividade criada com sucesso!');
    }

    public function show(Request $request, $id)
    {
        $data = DB::table('assuntos')
            ->where('disciplina_id', $request->id)
            ->pluck('assunto_nome', 'id');

        return response()->json($data);
    }

    public function showAtividade($id)
    {
        $atividadeshow = DB::table('atividades as ati')
            ->where('ati.id', '=', $id)
            ->where('ati.plano_id', '=', Session::get('id'))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('ati.*', 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('ati.atividade_data', 'asc')
            ->get();

        $assunto_ide = 0;
        foreach ($atividadeshow as $ati) {
            $assunto_ide = $ati->assunto_id;
        }

        $exercicio = DB::table('exercicios as exer')
            ->where('exer.atividade_id', '=', $id)
            ->get();

        $exer_id = 0;
        $exer_atividade = 0;
        foreach ($exercicio as $exer) {
            $exer_id = $exer->id;
            $exer_atividade = $exer->atividade_id;
        }

        return   $desempenhos = DB::table('desempenhos as des')
            ->where('des.exer_id', '=', $exer_id)
            ->join('exercicios as e', 'e.atividade_id', '=', $id)
            /* ->where('des.plano_id', '=', Session::get('id')) */
            ->select('des.*')
            ->get();

        $count_quantidade_certas = 0;
        $count_quantidade_erradas = 0;
        $count_quantidade_total = 0;
        foreach ($desempenhos as $des) {
            $count_quantidade_total = $des->desempenho_quantidade;
            $count_quantidade_certas = $des->desempenho_certas;
            $count_quantidade_erradas = $des->desempenho_erradas;
        }

        return view('pages.atividades.atividade-show', compact('atividadeshow', 'exercicio', 'desempenhos', 'count_quantidade_certas', 'count_quantidade_total', 'count_quantidade_erradas'));
    }

    public function edit($id)
    {
        $atividades_edit = Atividade::findOrFail($id);

        $assunto = DB::table('assuntos as ass')
            ->where('ass.id', '=', $atividades_edit->assunto_id)
            ->join('disciplinas as dis', 'dis.id', '=', 'ass.disciplina_id')
            ->get();

        $atividades_edit->assunto_id;

        return view('pages.atividades.atividade-edit', compact('atividades_edit', 'assunto'));
    }

    public function update(Request $request, $id)
    {
        $atividades_edit = Atividade::findOrFail($id);
        $atividades_edit->assunto_id = $atividades_edit->assunto_id;
        $atividades_edit->atividade_plano = implode(',', $request->input('tags'));
        $atividades_edit->atividade_data = $request->data_atividade;
        $atividades_edit->atividade_status = $request->status_atividade;
        $atividades_edit->atividade_prioridade = $request->prioridade_atividade;
        $atividades_edit->atividade_observacao = $request->observacao_atividade;

        $atividades_edit->save();

        return redirect()->route('atividade.index')->with('success', 'Atividade editada com sucesso!');
    }

    public function destroy($id)
    {
        $atividades = Atividade::find($id);
        $atividades->delete();
        return redirect()->route('atividade.index')->with('success', 'Atividade excluida com sucesso!');
    }
}
