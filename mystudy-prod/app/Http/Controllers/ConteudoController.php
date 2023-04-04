<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Models\Conteudo;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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



        /*  return
            $disciplinas = Disciplina::with(['assuntos' => function ($query) use ($edital_id) {
                $query->where('edital_id', $edital_id);
            }])
            ->whereHas('assuntos', function ($query) use ($edital_id) {
                $query->where('edital_id', $edital_id);
            })
            ->get();
 */

        $conteudos = DB::table('conteudos as conteudo')
            ->join('Assuntos as assunto', 'assunto.id', '=', 'conteudo.assunto_id')
            ->join('editals as edital', 'conteudo.edital_id', '=', 'edital.id')
            ->where('conteudo.edital_id', '=', $id)
            /*             ->join('conteudos as conteudo', 'conteudo.assunto_id', '=', 'assunto.id')
 */
            ->get();

        /*  return  $conteudos = DB::table('conteudos as conteudo')
            ->join('editals as edital', 'conteudo.edital_id', '=', 'edital.id')
            ->join('Assuntos as assunto', 'assunto.id', '=', 'conteudo.assunto_id')
            ->select('*')
            ->get(); */

        $disciplinas = Disciplina::with('assuntos')->get();

        return view("pages.conteudo.conteudo-show", compact('conteudos', 'disciplinas'));
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
