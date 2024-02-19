    <x-layouts.layouts>
        <nav>
            <a href="{{ route('recibo.index') }}" type="button" class="btn btn-secondary btns">VOLTAR</a>
            <a href="javascript:;" onclick="window.print();return true">
                <button type="button" class="btn btn-success btns">IMPRIMIR</button>
            </a>
        </nav>
        <div style="height:500px;margin-left:1%; overflow: auto; margin-top:10px">
            <div id="printable" class="printable">
                <div id="page-top">
                    <section
                        style="background:rgb(240, 238, 238);border: solid black;border-top-left-radius: 10PX;border-top-right-radius: 10PX;">
                        <div class="d-inline-block" style="width: 30%;margin-top:2px">
                            <label class="form-label" style="margin-left: 13px;">Numero:
                            </label>
                            <label class="form-label"
                                style="width: 100%;color: rgb(0,0,0);text-align: center;font-weight: bold;font-size: 20px;">
                                {{ $registro->id ?? null }}
                            </label>
                        </div>
                        <label class="form-label"
                            style="font-size: 35px;color: black;font-weight: bold;width:38%;text-align: center;">RECIBO
                        </label>
                        <div class="d-inline-block" style="width: 30%;margin-top:2px">
                            <label class="form-label" style="text-align: left;color: rgb(0,0,0);width: 90%;">Valor:
                            </label>
                            <label class="form-label"
                                style="width: 100%;color: rgb(0,0,0);text-align: center;font-size: 20px;font-weight: bold;">
                                {{ 'R$ ' . number_format($registro->valor, 2, ',', '.') }}
                            </label>
                        </div>
                    </section>
                    <section style="width: auto;background: white;color: var(--bs-black);border: solid black">
                        <div style="margin-left: 10PX;margin-right: 10PX;">
                            <label class="form-label"
                                style="width: 65%;margin-left: 1%;font-size: 11px;margin-bottom: 0px;">Recebido
                                de:</label>
                            <label class="form-label"
                                style="width: 30%;margin-left: 1%;font-size: 11px;margin-bottom: 0px;">CPF /
                                CNPJ:</label>
                            <label class="form-label"
                                style="height:44px;width: 65%;margin-bottom: 0px;font-size: 15px;font-weight: bold;margin-left: 1%;">
                                {{ $registro->recebi ?? null }}
                            </label>
                            <label class="form-label"
                                style="width: 30%;margin-bottom: 0px;font-size: 15px;font-weight: bold;margin-left: 1%;">
                                {{ $registro->cpf_recebido ?? null }}
                            </label>
                            <label class="form-label"
                                style="margin-bottom: 0px;margin-left: 1%;font-size: 11px;">Endereço:</label>
                            <label class="form-label d-table"
                                style="height:44px;width: 95%;margin-bottom: 0px;font-size: 15px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $registro->endereco ?? null }}
                            </label>
                            <label class="form-label"
                                style="width: 95%;margin-top: 2px;margin-bottom: 0px;margin-left: 1%;font-size: 11px;">A
                                importância de:
                            </label>
                            <label class="form-label d-table"
                                style="height:44px;text-transform: uppercase;width: 95%;margin-bottom: 0px;font-size: 15px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $valor_extenso ?? null }}
                            </label>
                            <label class="form-label"
                                style="width: 95%;margin-top: 2px;margin-bottom: 0px;margin-left: 1%;font-size: 11px;">Referente:
                            </label>
                            <label class="form-label d-table"
                                style="height:44px;width: 95%;margin-bottom: 1%;font-size: 15px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $registro->referente ?? null }}
                            </label>
                        </div>
                        <div class="text-end"
                            style="background:rgb(240, 238, 238);border-top: solid;border-bottom: solid;text-align: right;height: 42px;padding-bottom:50px">
                            <label class="form-label d-table d-md-flex justify-content-md-end align-items-md-center"
                                style="width: 91%;font-size: 15px;font-weight: bold;margin-left: 5%;margin-top: 15px">
                                {{ $registro->cidade ?? null }},
                                {{ date('d/m/Y', strtotime($registro->data)) ?? null }}
                            </label>
                        </div>
                        <div style="margin-left: 10PX;margin-right: 10PX;">
                            <label class="form-label"
                                style="width: 570px;margin-top: 5PX;margin-bottom: 0px;font-size: 11px;">Emitente:
                            </label>
                            <label class="form-label"
                                style="width: 200px;margin-top: 5PX;margin-bottom: 0px;font-size: 11px;">CPF /
                                CNPJ:
                            </label>
                            <label class="form-label"
                                style="margin-bottom: 0px;margin-top: 5PX;width: 170px;font-size: 11px;">RG /
                                INCRIÇÃO
                            </label>
                            <label class="form-label d-table-cell"
                                style="height:44px;width: 570px;margin-right: 1%;margin-left: 1%;font-size: 15px;font-weight: bold;">
                                {{ $registro->emitente ?? null }}
                            </label>
                            <label class="form-label d-table-cell"
                                style="font-size: 15px;font-weight: bold;margin-left: 1%;margin-bottom: 0px;width: 205px;">
                                {{ $registro->cpf_emitente ?? null }}
                            </label>
                            <label class="form-label d-table-cell"
                                style="font-size: 15px;font-weight: bold;margin-left: 10px;margin-bottom: 0px;margin-right: 1%;width: 170px;">
                                {{ $registro->rg ?? null }}
                            </label>
                            <label class="form-label"
                                style="width: 95%;margin-right: 1%;margin-bottom: 0px;font-size: 11px;">Endereço:</label><label
                                class="form-label d-table-cell"
                                style="height:44px;width: 900px;margin-right: 1%;margin-bottom: 0px;font-size: 15px;font-weight: bold;height: 44px;">
                                {{ $registro->end_emitente ?? null }}
                            </label>
                        </div>
                        <div class="d-md-flex justify-content-md-center align-items-md-center" style="width: 100%;">
                            <label class="form-label d-md-flex justify-content-md-center align-items-md-center"
                                style="width: 50%;margin-top: 50PX;margin-right: 25%;margin-left: 25%;text-align: center;border-top: solid;margin-bottom: 2px;">Assinatura
                            </label>
                        </div>
                    </section>
                </div>
                <style>
                    * {
                        -webkit-print-color-adjust: exact;
                    }

                    @media print {
                        body * {
                            visibility: hidden;
                        }

                        #printable,
                        #printable * {
                            visibility: visible;
                        }

                        #printable {
                            position: fixed;
                            left: 0;
                            top: 0;
                        }
                    }
                </style>
            </div>
        </div>
    </x-layouts.layouts>
