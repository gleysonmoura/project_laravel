<?php

namespace App\Http\Controllers;

use App\Models\Desempenho;
use App\Models\Meta;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $meta_questao = DB::table('metas as meta')
            ->where('atividades.plano_id', '=', Session::get('id'))
            ->join('atividades', 'atividades.id', '=', 'meta.atividade_id')
            ->join('assuntos as assu', 'assu.id', '=', 'atividades.assunto_id')
            /* ->join('desempenhos as des', 'meta.id', '=', 'des.meta_id') */
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->select('meta.*'/* , 'ati.*' */, 'assu.assunto_nome', 'dis.disciplina_none')
            /*    ->orderBy('meta.metavidade_data', 'asc') */
            ->paginate(5);

        $desempenhos = DB::table('desempenhos as des')
            ->join('metas as met', 'met.id', '=', 'des.meta_id')
            ->join('atividades as ati', 'ati.id', '=', 'met.atividade_id')
            ->where('ati.plano_id', '=', Session::get('id'))
            ->select('des.*')
            ->get();

        return view('pages.metaquestao.index-metaquestao', compact('meta_questao', 'desempenhos'));
    }

    /**
     * Show the form for cremetang a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.metaquestao.create-metaquestao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $meta_questao = new Meta();
        $meta_questao->atividade_id = $id;
        $meta_questao->meta_status = 'em andamento';
        $meta_questao->meta_quantidade = $request->quantidade_meta;

        $meta_questao->save();
        return back()->with('success', 'Meta de questões criada com sucesso!');
        //return redirect()->route('pages.metavidades.metavidade-show', $id)->with('success', 'Meta de questões criada com sucesso!');
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
