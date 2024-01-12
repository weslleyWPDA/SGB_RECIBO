<x-layouts.layouts titulo="Cadastro">
    <nav>
        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
    </nav>
    <form class="text-center d-grid user" autocomplete="off"
        style="width: 86%; height:auto;background:var(--cor_tela_u);padding: 1px;border-radius: 5px;margin-right: 7%;margin-left: 7%;border-width: 5px;margin-top: 10px;"
        method="post" action="{{ route('recibo.store') }}">
        @csrf
        <h1 style="color: #ffffff;font-weight: bold;font-size: 25px;width: 100%;margin-top: 2px;margin-bottom: -2px;">
            RECIBO</h1>
        <hr style="width: 80%;margin-right: 10%;margin-left: 10%;margin-top: 5px;" />
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin: 0px;margin-bottom: 39px;margin-top: -12px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 11px;text-align: left;">RECEBI
                DE:
                {{-- recebi --}}
                <input class=" d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="recebi" list="recebi-list" />
                <datalist id="recebi-list">
                    @foreach ($recebi as $item)
                        <option value="{{ $item->recebi }}">{{ $item->recebi }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -16px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;">ENDEREÇO:
                {{-- endereço --}}
                <input class=" d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="endereco" list="endereco" />
                <datalist id="endereco">
                    @foreach ($endereco as $item)
                        <option value="{{ $item->endereco }}">{{ $item->endereco }}</option>
                    @endforeach
                </datalist>
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
                    autocomplete="off" name="valor" />
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">CPF
                / CNPJ
                PAGADOR:
                {{-- CPF recebido --}}
                <input class=" upper cpfOuCnpj" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" list="cpf_receb" name="cpf_recebido" />
                <datalist id="cpf_receb" style="margin-top: 26px">
                    @foreach ($cpf_recebido as $item)
                        <option value="{{ $item->cpf_recebido }}">{{ $item->cpf_recebido }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;">
            <label class="form-label"
                style="width: 90%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;">REFERENTE:
                {{-- referente --}}
                <input class=" d-block upper " type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="referente" list="referente" />
                <datalist id="referente">
                    @foreach ($referente as $item)
                        <option value="{{ $item->referente }}">{{ $item->referente }}</option>
                    @endforeach
                </datalist>
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -6px;border-radius: 0px;background: rgba(94, 91, 91, 0.12);padding-top: 5px;padding-bottom: 5px;border-width: 5px;border-color: rgba(74,36,10,0);">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">CIDADE:
                {{-- cidade --}}
                <input class=" d-block  upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="cidade" list="cidade" />
                <datalist id="cidade">
                    @foreach ($cidade as $item)
                        <option value="{{ $item->cidade }}">{{ $item->cidade }}</option>
                    @endforeach
                </datalist>
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">DATA:
                {{-- data --}}
                <input class="" type="date" value="<?php echo date('Y-m-d'); ?>" required
                    style="font-size: 14px; padding:2px;text-align:center;height: auto;width: 100%;color: rgb(0,0,0);"
                    name="data" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -14px;border-radius: 10px;border-width: 10px;border-color: rgb(0,0,0);font-size: 13px;">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">EMITENTE:
                {{-- emitente --}}
                <input class=" d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px" required
                    autocomplete="off" title="Recebiemos" name="emitente" list="emitente" id="emitente_input"
                    onkeyup="GetDetail(this.value)" value="" />
                <datalist id="emitente">
                    @foreach ($emitente as $item)
                        <option value="{{ $item->emitente }}">{{ $item->emitente }}</option>
                    @endforeach
                </datalist>
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">CPF
                / CNPJ
                EMITENTE:
                {{-- CPF --}}
                <input class=" upper cpfOuCnpj2" type="text" name="cpf_emitente"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    required autocomplete="off" title="Recebiemos" list="emitente_cpf" id="emitente_cpfcnpj" />
            </label>
        </div>
        <div class="d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -14px;border-radius: 10px;border-width: 10px;border-color: rgb(0,0,0);font-size: 13px;">
            <label class="form-label"
                style="width: 60%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-right: 5%;">ENDEREÇO:
                {{-- endereço --}}
                <input class=" d-block upper" type="text"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    required autocomplete="off" name="end_emitente" list="emitente_endereco" id="emitente_end" />
            </label>
            <label class="form-label"
                style="width: 23%;color: rgb(255,255,255);font-size: 11px;text-align: left;margin: 0px;margin-bottom: 5px;margin-left: 2%;">RG
                / INSCRIÇÃO:
                {{-- rg --}}
                <input class=" upper " type="text" name="rg"
                    style="width: 100%;height: auto;color: rgb(0,0,0);margin: 0px;font-size: 14px; padding:2px"
                    autocomplete="off" />
            </label>
        </div>
        <div class="d-inline-block" style="width: 100%;background: rgba(255,255,255,0);margin: 5px;">
            <x-botoes.botoes type='submit' color='green' label='CADASTRAR' />
            <x-botoes.nav-botoes type='reset' color='red' label='LIMPAR' width='auto' />
        </div>
        <input hidden value="{{ Auth::user()->fazenda_id }}" name="fazenda_id" />
        <input hidden value="{{ Auth::user()->id }}" name="user_id" />
    </form>
    @push('script')
        <x-scripts.mask_js />
        <x-scripts.mask_cpfcnpj />
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
        <script>
            function GetDetail(str) {
                if (str.length == 0) {
                    document.getElementById("emitente_cpfcnpj").value = "";
                    document.getElementById("emitente_end").value = "";
                    return;
                } else {
                    // Creates a new XMLHttpRequest object
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 &&
                            this.status == 200) {

                            var myObj = JSON.parse(this.responseText);

                            document.getElementById("emitente_cpfcnpj").value = myObj[0];
                            document.getElementById("emitente_end").value = myObj[1];

                        }
                    };
                    // xhttp.open("GET", "filename", true);
                    xmlhttp.open("GET", "/retorno/" + str, true);
                    // Sends the request to the server
                    xmlhttp.send();
                }
            }
        </script>
    @endpush
</x-layouts.layouts>
