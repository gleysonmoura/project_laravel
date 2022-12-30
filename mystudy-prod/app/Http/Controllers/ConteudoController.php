<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assunto = new Assunto();

        $assunto->assunto_nome = $request->nome_assunto;
        $assunto->disciplina_id = $request->nome_disciplina;
        $assunto->assunto_prioridade = $request->prioridade_assunto;

        $assunto->save();

        return redirect()->route('conteudo.index')->with('Task Created Successfully!');
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
