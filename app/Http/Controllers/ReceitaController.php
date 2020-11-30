<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $receitas = Receita::latest()->paginate(5);

        return view('receitas.index', compact('receitas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'des' => 'required',
            'valr' => 'required',
            'vencc' => 'required',
            'stt' => 'required',
            'emiss' => 'required'
        ]);

        Receita::create($request->all());

        return redirect()->route('receitas.index')
            ->with('success', 'Receita criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        return view('receitas.show', compact('receita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        return view('receitas.edit', compact('receita'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        $request->validate([
            'des' => 'required',
            'valr' => 'required',
            'vencc' => 'required',
            'stt' => 'required',
            'emiss' => 'required'
        ]);
        $receita->update($request->all());

        return redirect()->route('receitas.index')
            ->with('success', 'Receita atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        $receita->delete();

        return redirect()->route('receitas.index')
            ->with('success', 'Receita deletada com sucesso!');
    }
}
