<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VisualizarEstudar extends Controller
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


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $dados_assunto = DB::table('atividades as atividade')
            ->where('atividade.assunto_id', '=', $id)
            ->join('assuntos as assunto', 'atividade.assunto_id', '=', 'assunto.id')
            ->join('disciplinas as disciplina', 'disciplina.id', 'assunto.disciplina_id')
            ->get();

        $exercicios = DB::table('exercicios as exer')
            ->where('exer.atividade_id', '=', $id)
            ->join('atividades', 'atividades.id', '=', 'exer.atividade_id')
            ->join('assuntos as assu', 'assu.id', '=', 'atividades.assunto_id')
            ->join('disciplinas as dis', 'assu.disciplina_id', '=', 'dis.id')
            ->get();
        // return $dados_assunto = Atividade::findOrFail($id);

        return view('pages.estudar.estudar-index', compact('dados_assunto', 'exercicios'));
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
