<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlano;
use App\Models\Desempenho;
use App\Models\Exercicio;
use App\Models\PlanoEstudo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanoEstudoController extends Controller
{
    public function index()
    {
        $planos = PlanoEstudo::all();
        return view('pages.planoestudo.planoestudo-index', compact('planos'));
    }

    public function create()
    {
        return view('pages.planoestudo.planoestudo-create');
    }

    public function store(CreatePlano $request)
    {
        $planos = new PlanoEstudo();

        $planos->plano_nome = $request->nome_plano;
        $planos->plano_data = $request->data_plano;
        $planos->plano_status = $request->status_plano;

        $planos->save();

        return redirect()->route('planoestudo.index')->with('success', 'Plano de estudo criado com sucesso!');
    }

    public function show($id)
    {

        Session::put('id', $id);
        $id_plano =  Session::get('id');
        $planos = PlanoEstudo::findOrFail($id);

        $atividades = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_data', '>=', date('Y/m/d', strtotime('-2 Monday')))
            ->Where('ati.atividade_data', '<=', date('Y/m/d', strtotime('+1 Monday')))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('ati.*', 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('ati.atividade_data', 'asc')
            ->get();


        $meta_questao = DB::table('metas as meta')
            ->where('atividades.plano_id', '=', Session::get('id'))
            /*  ->where('meta.meta_status', '!=', 'finalizada') */
            ->join('atividades', 'atividades.id', '=', 'meta.atividade_id')
            ->join('assuntos as assu', 'assu.id', '=', 'atividades.assunto_id')
            /* ->join('desempenhos as des', 'meta.id', '=', 'des.meta_id') */
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('meta.*'/* , 'ati.*' */, 'assu.assunto_nome', 'dis.disciplina_none')
            /*    ->orderBy('meta.metavidade_data', 'asc') */
            ->get();

        $count_atividade = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_status', '!=', 'finalizado')
            ->count();

        $count_desempenhos = Desempenho::select(DB::raw('SUM(desempenhos.desempenho_quantidade) as total_p'))
            ->join('exercicios as met', 'met.id', '=', 'desempenhos.exer_id')
            ->join('atividades as ati', 'ati.id', '=', 'met.atividade_id')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->get();

        foreach ($count_desempenhos as $a) {
            $count = $a->total_p;
        }

        $count_exercicios = Exercicio::select(DB::raw('SUM(exercicios.exer_quantidade)  as count_exer'))
            ->join('atividades', 'atividades.id', '=', 'exercicios.atividade_id')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->where('exercicios.exer_status', '=', 'em andamento')
            ->get();

        foreach ($count_exercicios as $a) {
            $count_exe = $a->count_exer;
        }

        $count_atividades = DB::table('atividades as ati')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->where('ati.atividade_data', '=', date('Y/m/d'))
            ->count();


        return view('pages.planoestudo.planoestudo-show', compact('planos', 'count', 'count_atividades', 'count_exe', 'atividades', 'count_atividade', 'count_desempenhos'));
    }

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
        $planos = PlanoEstudo::findOrFail($id);
        $planos->delete();
        return redirect()->route('planoestudo.index')->with('success', 'Plano excluida com sucesso!');
    }
}
