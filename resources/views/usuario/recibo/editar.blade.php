<x-layouts.layouts titulo="Editar">
    <nav>
        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
    </nav>
    <form class="text-center d-grid user"
        style="width: 86%; height:auto;background:var(--cor_tela_u);padding: 1px;border-radius: 5px;margin-right: 7%;margin-left: 7%;border-width: 5px;margin-top: 10px;"
        method="post" action="{{ route('recibo.update', $recibo->id) }}">
        @csrf
        @method('put')
        <h1 style="color: #ffffff;font-weight: bold;font-size: 25px;width: 100%;margin-top: 2px;margin-bottom: -2px;">
            RECIBO</h1>
        <hr style="width: 80%;margin-right: 10%;margin-left: 10%;margin-top: 0px;" />
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin: 0px;margin-bottom: 39px;margin-top: -12px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 12px;text-align: left;">RECEBEMOS
                DE:
                {{-- recebi --}}
                <input class="d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="recebi" list="recebi-list"
                    value="{{ $recibo->recebi ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -16px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;">ENDEREÇO:
                {{-- endereço --}}
                <input class="d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="endereco" list="endereco"
                    value="{{ $recibo->endereco ?? null }}" />
            </label>
        </div>
        {{-- quantidade e o cpf do recebido --}}
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;border-radius: 10px;border-width: 10px;border-color: rgb(0,0,0);font-size: 13px;">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">A
                IMPORTANCIA
                DE:
                {{-- valor --}}
                <input class=" d-block upper" type="text" id="dinheiro"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" name="valor" value="{{ $recibo->valor ?? null }}" />
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">CPF
                / CNPJ
                RECEBIDO:
                {{-- CPF recebido --}}
                <input class=" upper cpfOuCnpj" type="text" name="cpf_recebido"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" list="cpf_receb"
                    value="{{ $recibo->cpf_recebido ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -7px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;">REFERENTE:
                {{-- referente --}}
                <input class="d-block upper " type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="referente" list="referente"
                    value="{{ $recibo->referente ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;border-radius: 0px;background: rgba(0,0,0,0.12);padding-top: 5px;padding-bottom: 5px;border-width: 5px;border-color: rgba(74,36,10,0);">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">CIDADE:
                {{-- cidade --}}
                <input class="d-block  upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="cidade" list="cidade"
                    value="{{ $recibo->cidade ?? null }}" />
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">DATA:
                {{-- data --}}
                <input class="" type="date" required name="data"
                    style="font-size: 14px; padding:2px;text-align:center;height: auto;width: 100%;color: rgb(0,0,0);"
                    value="{{ $recibo->data ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;border-radius: 10px;border-width: 10px;border-color: rgb(0,0,0);font-size: 13px;">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">EMITENTE:
                {{-- emitente --}}
                <input class="d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="emitente" list="emitente"
                    value="{{ $recibo->emitente ?? null }}" />
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">CPF
                / CNPJ:
                {{-- CPF --}}
                <input class="upper cpfOuCnpj2" type="text" name="cpf_emitente"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    required autocomplete="off" title="Recebiemos" list="emitente_cpf"
                    value="{{ $recibo->cpf_emitente ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;border-radius: 10px;border-width: 10px;border-color: rgb(0,0,0);font-size: 13px;">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">ENDEREÇO:
                {{-- endereço --}}
                <input class="d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    required autocomplete="off" name="end_emitente" list="emitente_endereco"
                    value="{{ $recibo->end_emitente ?? null }}" />

            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 12px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">RG
                / INSCRIÇÃO:
                {{-- rg --}}
                <input class="upper " type="text" name="rg"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    autocomplete="off" value="{{ $recibo->rg ?? null }}" />
            </label>
        </div>
        <div class="d-inline-block" style="width: 100%;background: rgba(255,255,255,0);margin: 5px;">
            <button style="border:none;font-weight: 800;margin:5px;color:white" type="submit"
                class="btn btn-warning btns botoes">EDITAR</button>
            <a href="{{ route('recibo.index') }}" style="text-decoration: none">
                <x-botoes.botoes type='buttom' color='red' label='CANCELAR' />
            </a>
        </div>
        <input hidden value="{{ $recibo->fazenda_id }}" name="fazenda_id" />
        <input hidden value="{{ $recibo->user_id }}" name="user_id" />
    </form>
    @push('css')
        <link href="{{ URL::asset('publico/css/adm-css-inicio.css') }}" rel="stylesheet">
    @endpush
    @push('script')
        <x-scripts.mask_js />
        <x-scripts.mask_cpfcnpj />
    @endpush
</x-layouts.layouts>
