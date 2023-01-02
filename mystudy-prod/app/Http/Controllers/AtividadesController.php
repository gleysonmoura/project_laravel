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
        // $atividades = Atividades::all();

        return view('pages.atividades.atividade-index');
    }

    public function create()
    {
        $lista_disciplina = Disciplina::all();
        return view('pages.atividades.atividade-create', compact('lista_disciplina'));
    }


    public function store(Request $request)
    {
        $atividades = new Atividade();
        $atividades->assunto_id = $request->campo_assunto;
        $atividades->atividade_data = $request->data_atividade;
        $atividades->atividade_status = $request->status_atividade;
        $atividades->atividade_prioridade = $request->prioridade_atividade;
        $atividades->atividade_observacao = $request->observacao_atividade;

        $atividades->save();

        return redirect()->route('atividade.index')->with('Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = DB::table('assuntos')
            ->where('disciplina_id', $request->id)
            ->pluck('assunto_nome', 'id');
        return  $data;
        return response()->json($data);
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
