<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cidade;
use App\Models\cpf_emitente;
use App\Models\cpf_recebido;
use App\Models\emitente;
use App\Models\end_emitente;
use App\Models\endereco;
use App\Models\recebi;
use App\Models\recibo;
use App\Models\referente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phputil\extenso\Extenso;
use Yajra\DataTables\Facades\DataTables;

class UserReciboCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuario.recibo.listarecibo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recebi = recebi::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $endereco = endereco::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $referente = referente::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $cidade = cidade::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $emitente = emitente::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $cpf_emitente = cpf_emitente::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $end_emitente = end_emitente::where('fazenda_id', Auth::user()->fazenda_id)->get();
        $cpf_recebido = cpf_recebido::where('fazenda_id', Auth::user()->fazenda_id)->get();

        return view('usuario.recibo.cadastro', compact(
            'recebi',
            'endereco',
            'referente',
            'cidade',
            'emitente',
            'cpf_emitente',
            'end_emitente',
            'cpf_recebido'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validacao = $r->validate([
            'recebi' =>  'required',
            'endereco' =>  'required',
            'valor' =>   'required',
            'referente' =>  'required',
            'cidade' =>  'required',
            'emitente' =>  'required',
            'data' =>  'required',
            'cpf_emitente' =>  'required|min:14|max:18',
            'end_emitente' =>  'required',
            'fazenda_id' => 'nullable',
            'user_id' => 'required',
            'rg' => 'nullable',
            'cpf_recebido' =>  'nullable',

        ]);

        try {
            $recebi = recebi::firstOrNew(['recebi' =>  request('recebi'), 'fazenda_id' =>  request('fazenda_id')]);
            $recebi->recebi = request('recebi');
            $recebi->save();
            // ===============
            $endereco = endereco::firstOrNew(['endereco' =>  request('endereco'), 'fazenda_id' =>  request('fazenda_id')]);
            $endereco->endereco = request('endereco');
            $endereco->save();
            // ===============
            $referente = referente::firstOrNew(['referente' =>  request('referente'), 'fazenda_id' =>  request('fazenda_id')]);
            $referente->referente = request('referente');
            $referente->save();
            // ===============
            $cidade = cidade::firstOrNew(['cidade' =>  request('cidade'), 'fazenda_id' =>  request('fazenda_id')]);
            $cidade->cidade = request('cidade');
            $cidade->save();
            // ===============
            $emitente = emitente::firstOrNew(['emitente' =>  request('emitente'), 'fazenda_id' =>  request('fazenda_id')]);
            $emitente->emitente = request('emitente');
            $emitente->save();
            // ===============
            $cpf_emitente = cpf_emitente::firstOrNew(['cpf_emitente' =>  request('cpf_emitente'), 'fazenda_id' =>  request('fazenda_id')]);
            $cpf_emitente->cpf_emitente = request('cpf_emitente');
            $cpf_emitente->save();
            // ===============
            $end_emitente = end_emitente::firstOrNew(['end_emitente' =>  request('end_emitente'), 'fazenda_id' =>  request('fazenda_id')]);
            $end_emitente->end_emitente = request('end_emitente');
            $end_emitente->save();
            // ===============
            $cpf_recebido = cpf_recebido::firstOrNew(['cpf_recebido' =>  request('cpf_recebido'), 'fazenda_id' =>  request('fazenda_id')]);
            $cpf_recebido->cpf_recebido = request('cpf_recebido');
            $cpf_recebido->save();
            // ===============

        } catch (Exception) {
            toast('Erro ao Cadastrar!', 'error');
            return redirect()->route('recibo.index');
        }
        //O cadastro
        // convertendo numero para 10.2
        $str = str_replace('.', '', $r->valor);
        $valor = str_replace(',', '.', $str);

        $cad = recibo::create([
            'recebi' =>  $validacao['recebi'],
            'endereco' =>  $validacao['endereco'],
            'valor' =>   $valor,
            'referente' => $validacao['referente'],
            'cidade' =>  $validacao['cidade'],
            'emitente' =>  $validacao['emitente'],
            'data' =>  $validacao['data'],
            'cpf_emitente' =>  $validacao['cpf_emitente'],
            'end_emitente' => $validacao['end_emitente'],
            'fazenda_id' => $validacao['fazenda_id'],
            'user_id' => $validacao['user_id'],
            'rg' => $validacao['rg'],
            'cpf_recebido' =>  $validacao['cpf_recebido'],

        ]);
        toast('Cadastrado com Sucesso!', 'success');
        return redirect()->route('recibo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $r)
    {
        $registro = recibo::find($r->id);
        $extenso = new Extenso();
        $valor_extenso = $extenso->extenso($registro->valor, Extenso::MOEDA);
        return view('usuario.recibo.pdf', compact(
            'registro',
            'valor_extenso',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $r)
    {
        $recibo = recibo::find($r->id);
        return view('usuario.recibo.editar', compact('recibo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        // convertendo numero para 10.2
        $str = str_replace('.', '', $r->valor);
        $valor = str_replace(',', '.', $str);

        recibo::where('id', $id)->update([
            "recebi" => $r->recebi,
            "endereco" => $r->endereco,
            "valor" => $valor,
            "referente" => $r->referente,
            "cidade" => $r->cidade,
            "data" => $r->data,
            "emitente" => $r->emitente,
            "cpf_emitente" => $r->cpf_emitente,
            "end_emitente" => $r->end_emitente,
            "rg" => $r->rg,
            "fazenda_id" => $r->fazenda_id,
            "user_id" => $r->user_id,
            "cpf_recebido" => $r->cpf_recebido,

        ]);
        toast('Editado com Sucesso!', 'warning');
        return redirect()->route('recibo.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $r)
    {
        recibo::where('id', $r->id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
    /**
     *
     */
    public function recibo_ajax()
    {
        $recibo = recibo::select(
            'recibos.id',
            'recibos.delete',
            'recibos.recebi',
            'recibos.valor',
            'recibos.emitente',
            'recibos.data',
            'recibos.fazenda_id',
            'fazendas.name as fazname'
        )
            ->whereNUll('recibos.delete')
            ->where('recibos.fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->leftjoin('fazendas', 'recibos.fazenda_id', '=', 'fazendas.id')
            ->orderby('id', 'DESC');

        return DataTables::of($recibo)->make(true);
    }
}
