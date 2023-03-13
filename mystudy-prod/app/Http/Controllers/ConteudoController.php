<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Models\Conteudo;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConteudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplina = DB::table('disciplinas as d')
            ->join('Assuntos as a', 'd.id', '=', 'a.disciplina_id')
            ->get();
        return view("pages.conteudo.index", compact('disciplina'));
        /* 
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')->with('seasons', $seasons)->with('series', $series); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplina = Disciplina::all();

        return view("pages.conteudo.create", compact('disciplina'));
    }

    public function store(Request $request)
    {
        $assunto = new Assunto();

        $assunto->assunto_nome = $request->nome_assunto;
        $assunto->disciplina_id = $request->nome_disciplina;
        $assunto->assunto_prioridade = $request->prioridade_assunto;

        $assunto->save();

        return redirect()->route('conteudo.index')->with('Task Created Successfully!');
    }

    public function show($id)
    {
        $conteudos = DB::table('conteudos as conteudo')
            ->join('editals as edital', 'conteudo.edital_id', '=', 'edital.id')
            ->join('Assuntos as assunto', 'assunto.id', '=', 'conteudo.assunto_id')
            ->join('disciplinas as disciplina', 'disciplina.id', '=', 'assunto.disciplina_id')
            ->orderBy('disciplina.disciplina_none')
            ->get();

        return view("pages.conteudo.conteudo-show", compact('conteudos'));
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
