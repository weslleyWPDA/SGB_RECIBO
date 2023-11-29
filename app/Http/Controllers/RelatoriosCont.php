<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use App\Models\recibo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatoriosCont extends Controller
{
    public function tela_relatorio()
    {
        $fazenda = Fazenda::whereNull('delete')->get();
        return view('admin.recibo.relatorio', compact(
            'fazenda',
        ));
    }
    //======================================
    public function tab_relatorio(Request $r)
    {
        $recibo = recibo::where('fazenda_id', 'LIKE', Auth::user()->admin == null ? Auth::user()->fazenda_id : $r->dfaz)
            ->whereBetween('data', [$r->d1 . " 00:00:00", $r->d2 . " 23:59:59"])
            ->whereNUll('delete')
            ->get();
        return view('admin.recibo.listar_relatorio', compact('recibo'));
    }
}
