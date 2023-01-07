<?php

namespace App\Http\Controllers;

use App\Models\PlanoEstudo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        return view('pages.planoestudo.planoestudo-show', compact('planos'));
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
