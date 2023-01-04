<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;


class AtividadesController extends Controller
{
    public function index()
    {
        $atividades = DB::table('atividades as ati')
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('ati.*', 'assu.assunto_nome', 'dis.disciplina_none')
            ->orderBy('ati.atividade_data', 'asc')
            ->get();
        $tags_atividades = "";

        foreach ($atividades as $ati) {
            $tags_atividades = explode(',', $ati->tags_nome);
        }
        return view('pages.atividades.atividade-index', compact('atividades', 'tags_atividades'));
    }

    public function create()
    {
        $lista_disciplina = Disciplina::all();
        return view('pages.atividades.atividade-create', compact('lista_disciplina',));
    }

    public function store(Request $request)
    {
        $atividades = new Atividade();
        $atividades->assunto_id = $request->campo_assunto;
        $atividades->tags_nome = implode(',', $request->input('tags'));
        $atividades->atividade_data = $request->data_atividade;
        $atividades->atividade_status = $request->status_atividade;
        $atividades->atividade_prioridade = $request->prioridade_atividade;
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
        $atividades_edit->tags_nome = implode(',', $request->input('tags'));
        $atividades_edit->atividade_data = $request->data_atividade;
        $atividades_edit->atividade_status = $request->status_atividade;
        $atividades_edit->atividade_prioridade = $request->prioridade_atividade;
        $atividades_edit->atividade_observacao = $request->observacao_atividade;

        $atividades_edit->save();

        return redirect()->route('atividade.index')->with('success', 'Atividade editada com sucesso!');
    }

    public function destroy($id)
    {
        //
    }
}
