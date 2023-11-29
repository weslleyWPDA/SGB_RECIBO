<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use Illuminate\Http\Request;

class FazendaAdmCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fazenda = Fazenda::whereNull('delete')->get();
        return view('admin.fazenda.listar', compact('fazenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fazenda.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        if (Fazenda::create([
            'name' => $r->fazenda
        ])) {
            toast('Cadastrado!', 'success');
            return redirect()->route('fazendas.index');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fazenda = Fazenda::find($id);
        if (!$fazenda) {
            return redirect(route('fazendas.index'));
        }
        return view('admin.fazenda.editar', compact('fazenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        if (Fazenda::where('id', $id)->update([
            'name' => $r->nome,
        ])) {
            toast('Editado com Sucesso!', 'success');
            return redirect()->route('fazendas.index');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fazenda::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
