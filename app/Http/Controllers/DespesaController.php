<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
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
        $despesas = Despesa::latest()->paginate(5);

        return view('despesas.index', compact('despesas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('despesas.create');
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

        Despesa::create($request->all());

        return redirect()->route('despesas.index')
            ->with('success', 'Despesa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa $despesa)
    {
        return view('despesas.show', compact('despesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        return view('despesas.edit', compact('despesa'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa $despesa)
    {
        $request->validate([
            'des' => 'required',
            'valr' => 'required',
            'vencc' => 'required',
            'stt' => 'required',
            'emiss' => 'required'
        ]);
        $despesa->update($request->all());

        return redirect()->route('despesas.index')
            ->with('success', 'Despesa atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        $despesa->delete();

        return redirect()->route('despesas.index')
            ->with('success', 'Despesa deletada com sucesso!');
    }
}
