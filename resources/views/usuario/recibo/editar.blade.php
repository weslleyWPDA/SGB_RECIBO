<x-layouts.layouts>
    <nav>
        <a href="{{ route('recibo.index') }}" type="button" class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <link href="{{ URL::asset('publico/css/cadastro.css') }}" rel="stylesheet">
    <form class="receipt-form" autocomplete="off" method="post" action="{{ route('recibo.update', $recibo->id) }}">
        @csrf
        @method('put')
        <h1 class="receipt-title">EDITAR RECIBO</h1>
        <hr class="receipt-hr" />
        <div class="receipt-flex-container d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">RECEBI
                DE:
                {{-- recebi --}}
                <input class="custom-input upper" type="text" required autocomplete="off" title="Recebiemos"
                    name="recebi" list="recebi-list" onkeyup="GetDetail2(this.value)" id="recebi"
                    value="{{ $recibo->recebi ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">ENDEREÇO:
                {{-- endereço --}}
                <input class=" d-block upper custom-input" type="text" required autocomplete="off" title="Recebiemos"
                    name="endereco" list="endereco" value="{{ $recibo->endereco ?? null }}" />
            </label>
        </div>
        {{-- quantidade e o cpf do recebido --}}
        <div class="custom-flex-container mb-3">
            <label class="label_menor">A
                IMPORTANCIA
                DE (R$):
                {{-- valor --}}
                <input class=" input_menor upper" type="text" id="dinheiro" required autocomplete="off"
                    name="valor" value="{{ number_format($recibo->valor, 2, ',', '.') }}  " />
            </label>
            <label class="label_menor2">CPF
                / CNPJ
                PAGADOR:
                {{-- CPF recebido --}}
                <input class="input_menor2 upper cpfOuCnpj" type="text" required autocomplete="off" list="cpf_receb"
                    name="cpf_recebido" id="cpf_recebido" value="{{ $recibo->cpf_recebido ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">REFERENTE:
                {{-- referente --}}
                <input class="custom-input upper" required autocomplete="off" title="Recebiemos" name="referente"
                    list="referente" value="{{ $recibo->referente ?? null }}" />
            </label>
        </div>
        <div class="custom-styled-container mb-3">
            <label class="label_menor">CIDADE
                - UF:
                {{-- cidade --}}
                <input class=" input_menor upper" required autocomplete="off" title="Recebiemos" name="cidade"
                    list="cidade" value="{{ $recibo->cidade ?? null }}" />
            </label>
            <label class="label_menor2">DATA:
                {{-- data --}}
                <input class=" input_menor2 upper text-center" type="date" value="<?php echo date('Y-m-d'); ?>" required
                    name="data" value="{{ $recibo->data ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="label_menor">EMITENTE:
                {{-- emitente --}}
                <input class=" input_menor upper" type="text" required autocomplete="off" title="Recebiemos"
                    name="emitente" list="emitente-list" id="emitente" id="emitente_input"
                    onkeyup="GetDetail(this.value)" value="{{ $recibo->emitente ?? null }}" />
            </label>
            <label class="label_menor2">CPF
                / CNPJ
                EMITENTE:
                {{-- CPF --}}
                <input class=" input_menor2 upper cpfOuCnpj2" type="text" name="cpf_emitente" required
                    autocomplete="off" title="Recebiemos" list="emitente_cpf" id="emitente_cpfcnpj"
                    value="{{ $recibo->cpf_emitente ?? null }}" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="label_menor">ENDEREÇO:
                {{-- endereço --}}
                <input class=" input_menor upper" type="text" required autocomplete="off" name="end_emitente"
                    list="emitente_endereco" id="emitente_end" value="{{ $recibo->end_emitente ?? null }}" />
            </label>
            <label class="label_menor2">RG
                / INSCRIÇÃO:
                {{-- rg --}}
                <input class=" input_menor2 upper " type="text" name="rg" id="rg" autocomplete="off"
                    list="rg_emit" value="{{ $recibo->rg ?? null }}" />
            </label>
        </div>
        <div class="d-inline-block">
            <button type="submit" class="btn btn-warning btns">EDITAR</button>
            <a href="{{ route('recibo.index') }}" type="button" class="btn btn-danger btns">CANCELAR</a>
        </div>
    </form>
    @push('script')
        <x-scripts.mask_js />
        <x-scripts.mask_cpfcnpj />
        <x-scripts.jscadastro />
    @endpush
</x-layouts.layouts>
