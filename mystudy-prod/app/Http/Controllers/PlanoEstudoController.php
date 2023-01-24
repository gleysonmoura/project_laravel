<?php

namespace App\Http\Controllers;

use App\Models\PlanoEstudo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanoEstudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planos = PlanoEstudo::all();
        return view('pages.planoestudo.planoestudo-index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.planoestudo.planoestudo-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planos = new PlanoEstudo();

        $planos->plano_nome = $request->nome_plano;
        $planos->plano_data = $request->data_plano;
        $planos->plano_status = $request->status_plano;

        $planos->save();

        return redirect()->route('planoestudo.index')->with('success', 'Plano de estudo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return view('pages.planoestudo.planoestudo-show', compact('planos', 'atividades'));
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
