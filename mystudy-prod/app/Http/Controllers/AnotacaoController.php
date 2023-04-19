<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anotacao as RequestsAnotacao;
use App\Http\Requests\CreateAnotacao;
use App\Models\Anotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnotacaoController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;
        $notas = Anotacao::where(function ($query) use ($search) {
            if ($search) {
                $query->where('titulo_anotacao', 'LIKE', "%{$search}");
                $query->orwhere('assunto_nome', 'LIKE', "%{$search}");
            }
        })
            ->join('assuntos', 'anotacoes.assunto_id', '=', 'assuntos.id')
            ->select('anotacoes.*', 'assuntos.assunto_nome')
            ->get();


        /* dd($notas); */

        return view('pages.anotacao.anotacao-index', compact('notas'));
    }

    public function addnotas($id)
    {
        $atividadeshow = DB::table('atividades as ati')
            ->where('ati.id', '=', $id)
            ->where('ati.plano_id', '=', Session::get('id'))
            ->join('assuntos as assu', 'assu.id', '=', 'ati.assunto_id')
            ->select('ati.id', 'ati.plano_id', 'assu.*')
            ->get();

        $notas = Anotacao::all();
        return view('pages.anotacao.storeanotacao', compact('notas', 'atividadeshow'));
    }


    public function create()
    {
    }


    public function storeanotacao(CreateAnotacao $request, $id)
    {

        $notas = new Anotacao();
        $notas->titulo_anotacao = $request->titulo_anotacao;
        $notas->texto_anotacao = $request->descricao_anotacao;
        $notas->assunto_id = $id;
        $notas->plano_id = Session::get('id');;

        $notas->save();

        return back()->with('success', 'Anotação cadastrada com sucesso!');
    }


    public function show($id)
    {
        $anotacao = DB::table('anotacoes as anotacoes')
            ->join('assuntos', 'anotacoes.assunto_id', '=', 'assuntos.id')
            ->where('anotacoes.id', '=', $id)
            ->select('anotacoes.*', 'assuntos.assunto_nome')
            ->get();


        return view('pages.anotacao.anotacao-show', compact('anotacao'));
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
        //
    }
}
