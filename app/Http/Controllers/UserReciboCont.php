<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cidade;
use App\Models\emitente;
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
        return view('usuario.recibo.cadastro', compact(
            'recebi',
            'endereco',
            'referente',
            'cidade',
            'emitente',
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
            'cpf_emitente' =>  'required',
            'end_emitente' =>  'required',
            'fazenda_id' => 'nullable',
            'user_id' => 'required',
            'rg' => 'nullable',
            'cpf_recebido' =>  'nullable',
        ]);

        try {

            $recebi = recebi::firstOrNew(
                [
                    'recebi' =>  $validacao['recebi'], 'fazenda_id' =>  request('fazenda_id')
                ]
            );
            $recebi->recebi =  $validacao['recebi'];
            $recebi->cpf_recebido =  $validacao['cpf_recebido'];
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
            $emitente = emitente::firstOrNew(
                [
                    'emitente' =>  $validacao['emitente'],
                ]
            );
            $emitente->emitente =  $validacao['emitente'];
            $emitente->cpf_emitente =  $validacao['cpf_emitente'];
            $emitente->fazenda_id =  $validacao['fazenda_id'];
            $emitente->end_emitente =  $validacao['end_emitente'];
            $emitente->rg =  $validacao['rg'] ?? '';
            $emitente->save();
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
     * =====================================================
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
    /**
     * =====================================================
     */
    public function retorno($emitente_input)
    {
        if ($emitente_input !== "") {

            $query = emitente::where('emitente', 'like', $emitente_input)->where('fazenda_id', 'like', Auth::user()->fazenda_id)->first();
            // Get the first name
            $emitente_cpfcnpj = $query["cpf_emitente"];
            $emitente_end = $query["end_emitente"];
            $rg = $query["rg"];
        }

        // Store it in a array
        $result = array("$emitente_cpfcnpj", "$emitente_end", "$rg");
        // Send in JSON encoded form
        $myJSON = json_encode($result);
        echo $myJSON;
    }
    /**
     * =====================================================
     */
    public function retornoRecebi($recebi)
    {
        if ($recebi !== "") {

            // Get corresponding first name and
            // last name for that user id
            $query = recebi::where('recebi', 'like', $recebi)->where('fazenda_id', 'like', Auth::user()->fazenda_id)->first();

            // $row = mysqli_fetch_array($query);

            // Get the first name
            $cpf_recebido = $query["cpf_recebido"];
            // Get the first name
        }

        // Store it in a array
        $result = array("$cpf_recebido");
        // Send in JSON encoded form
        $myJSON = json_encode($result);
        echo $myJSON;
    }
}
