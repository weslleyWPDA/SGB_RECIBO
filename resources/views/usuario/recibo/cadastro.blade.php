<x-layouts.layouts>
    <nav>
        <a href="{{ route('u_inicio') }}" type="button" class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <link href="{{ URL::asset('publico/css/cadastro.css') }}" rel="stylesheet">
    <form class="receipt-form" autocomplete="off" method="post" action="{{ route('recibo.store') }}">
        @csrf
        <h1 class="receipt-title">RECIBO</h1>
        <hr class="receipt-hr" />
        <div class="receipt-flex-container d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">RECEBI
                DE:
                {{-- recebi --}}
                <input class="custom-input upper" type="text" required autocomplete="off" title="Recebiemos"
                    name="recebi" list="recebi-list" onkeyup="GetDetail2(this.value)" id="recebi" />
                <datalist id="recebi-list">
                    @foreach ($recebi as $item)
                        <option value="{{ $item->recebi }}">{{ $item->recebi }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">ENDEREÇO:
                {{-- endereço --}}
                <input class=" d-block upper custom-input" type="text" required autocomplete="off" title="Recebiemos"
                    name="endereco" list="endereco" />
                <datalist id="endereco">
                    @foreach ($endereco as $item)
                        <option value="{{ $item->endereco }}">{{ $item->endereco }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        {{-- quantidade e o cpf do recebido --}}
        <div class="custom-flex-container mb-3">
            <label class="label_menor">A
                IMPORTANCIA
                DE (R$):
                {{-- valor --}}
                <input class=" input_menor upper" type="text" id="dinheiro" required autocomplete="off"
                    name="valor" />
            </label>
            <label class="label_menor2">CPF
                / CNPJ
                PAGADOR:
                {{-- CPF recebido --}}
                <input class="input_menor2 upper cpfOuCnpj" type="text" required autocomplete="off" list="cpf_receb"
                    name="cpf_recebido" id="cpf_recebido" />
                <datalist id="cpf_receb">
                    @foreach ($recebi as $item)
                        <option value="{{ $item->cpf_recebido }}">{{ $item->cpf_recebido }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="custom-label">REFERENTE:
                {{-- referente --}}
                <input class="custom-input upper" required autocomplete="off" title="Recebiemos" name="referente"
                    list="referente" />
                <datalist id="referente">
                    @foreach ($referente as $item)
                        <option value="{{ $item->referente }}">{{ $item->referente }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="custom-styled-container mb-3">
            <label class="label_menor">CIDADE
                - UF:
                {{-- cidade --}}
                <input class=" input_menor upper" required autocomplete="off" title="Recebiemos" name="cidade"
                    list="cidade" />
                <datalist id="cidade">
                    @foreach ($cidade as $item)
                        <option value="{{ $item->cidade }}">{{ $item->cidade }}</option>
                    @endforeach
                </datalist>
            </label>
            <label class="label_menor2">DATA:
                {{-- data --}}
                <input class=" input_menor2 upper text-center" type="date" value="<?php echo date('Y-m-d'); ?>" required
                    name="data" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="label_menor">EMITENTE:
                {{-- emitente --}}
                <input class=" input_menor upper" type="text" required autocomplete="off" title="Recebiemos"
                    name="emitente" list="emitente-list" id="emitente" id="emitente_input"
                    onkeyup="GetDetail(this.value)" value="" />
                <datalist id="emitente-list">
                    @foreach ($emitente as $item)
                        <option value="{{ $item->emitente }}">{{ $item->emitente }}</option>
                    @endforeach
                </datalist>
            </label>
            <label class="label_menor2">CPF
                / CNPJ
                EMITENTE:
                {{-- CPF --}}
                <input class=" input_menor2 upper cpfOuCnpj2" type="text" name="cpf_emitente" required
                    autocomplete="off" title="Recebiemos" list="emitente_cpf" id="emitente_cpfcnpj" />
                <datalist id="emitente_cpf">
                    @foreach ($emitente as $item)
                        <option value="{{ $item->cpf_emitente }}">{{ $item->cpf_emitente }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
            <label class="label_menor">ENDEREÇO:
                {{-- endereço --}}
                <input class=" input_menor upper" type="text" required autocomplete="off" name="end_emitente"
                    list="emitente_endereco" id="emitente_end" />
                <datalist id="emitente_endereco">
                    @foreach ($emitente as $item)
                        <option value="{{ $item->end_emitente }}">{{ $item->end_emitente }}</option>
                    @endforeach
                </datalist>
            </label>
            <label class="label_menor2">RG
                / INSCRIÇÃO:
                {{-- rg --}}
                <input class=" input_menor2 upper " type="text" name="rg" id="rg" autocomplete="off"
                    list="rg_emit" />
                <datalist id="rg_emit">
                    @foreach ($emitente as $item)
                        <option value="{{ $item->rg }}">{{ $item->rg }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-inline-block">
            <button type="submit" class="btn btn-success btns">CADASTRAR</button>
            <button type='reset' class="btn btn-danger btns">LIMPAR</button>
        </div>
        <input hidden value="{{ Auth::user()->fazenda_id }}" name="fazenda_id" />
        <input hidden value="{{ Auth::user()->id }}" name="user_id" />
    </form>
    @push('script')
        <x-scripts.mask_js />
        <x-scripts.mask_cpfcnpj />
        <x-scripts.jscadastro />
    @endpush
</x-layouts.layouts>
