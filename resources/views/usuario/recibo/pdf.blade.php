    <x-layouts.layouts titulo="SGB RECIBO">

        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
        <a href="javascript:;" onclick="window.print();return true">
            <x-botoes.botoes type='buttom' color='green' label='IMPRIMIR' />
        </a>

        <div style="height:500px; width:auto;margin-left:1%; overflow: auto; margin-top:10px">
            <div id="printable" class="printable">
                <div id="page-top">
                    <section class="d-inline-block d-md-flex justify-content-md-center align-items-md-center"
                        style="background:rgb(240, 238, 238);width: 980px;margin-right: 2%;margin-top: 1%;border: solid;border-color: rgb(0,0,0);border-top-left-radius: 10PX;border-top-right-radius: 10PX;padding: 0;margin-left: 2%;">
                        <div class="d-inline-block"
                            style="width: 30%;line-height: 26px;border-right-color: rgb(0,0,0);"><label
                                class="form-label d-inline-block"
                                style="color: rgb(0,0,0);margin-left: 13px;">Numero:</label><label
                                class="form-label d-inline-block"
                                style="width: 98%;color: rgb(0,0,0);text-align: center;font-weight: bold;font-size: 20px;">
                                {{ $registro->id ?? null }}
                            </label>
                        </div><label class="form-label"
                            style="font-size: 40px;color: rgb(0,0,0);font-weight: bold;width: 38%;text-align: center;margin-top: 8px;">RECIBO</label>
                        <div class="d-inline-block"
                            style="width: 30%;text-align: right;border-left-color: rgb(0,0,0);margin-top: 4px;"><label
                                class="form-label d-inline-block"
                                style="text-align: left;color: rgb(0,0,0);width: 90%;">Valor:</label><label
                                class="form-label d-inline-block"
                                style="width: 98%;color: rgb(0,0,0);text-align: center;font-size: 20px;font-weight: bold;">
                                {{ 'R$ ' . number_format($registro->valor, 2, ',', '.') }}
                            </label>
                        </div>
                    </section>
                    <section
                        style="width: 980px;background: white;margin-left: 2%;margin-right: 2%;color: var(--bs-black);border: solid;margin-top: -2px;">
                        <div style="margin-left: 10PX;margin-right: 10PX;"><label class="form-label"
                                style="width: 65%;margin-left: 1%;font-size: 11px;margin-bottom: 0px;">Recebido
                                de:</label><label class="form-label"
                                style="width: 30%;margin-left: 1%;font-size: 11px;margin-bottom: 0px;">CPF /
                                CNPJ:</label><label class="form-label"
                                style="height:44px;width: 65%;margin-bottom: 0px;font-size: 16px;font-weight: bold;margin-left: 1%;">
                                {{ $registro->recebi ?? null }}
                            </label><label class="form-label"
                                style="width: 30%;margin-bottom: 0px;font-size: 16px;font-weight: bold;margin-left: 1%;">
                                {{ $registro->cpf_recebido ?? null }}
                            </label><label class="form-label"
                                style="margin-bottom: 0px;margin-left: 1%;font-size: 11px;">Endereço:</label><label
                                class="form-label d-table"
                                style="height:44px;width: 95%;margin-bottom: 0px;font-size: 16px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $registro->endereco ?? null }}
                            </label><label class="form-label"
                                style="width: 95%;margin-top: 2px;margin-bottom: 0px;margin-left: 1%;font-size: 11px;">A
                                importância de:</label><label class="form-label d-table"
                                style="height:44px;text-transform: uppercase;width: 95%;margin-bottom: 0px;font-size: 16px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $valor_extenso ?? null }}
                            </label><label class="form-label"
                                style="width: 95%;margin-top: 2px;margin-bottom: 0px;margin-left: 1%;font-size: 11px;">Referente:</label><label
                                class="form-label d-table"
                                style="height:44px;width: 95%;margin-bottom: 1%;font-size: 16px;font-weight: bold;margin-top: 2px;margin-left: 1%;">
                                {{ $registro->referente ?? null }}
                            </label>
                        </div>
                        <div class="text-end"
                            style="background:rgb(240, 238, 238);border-top: solid;border-bottom: solid;text-align: right;height: 42px;padding-bottom:50px">
                            <label class="form-label d-table d-md-flex justify-content-md-end align-items-md-center"
                                style="width: 91%;font-size: 16px;font-weight: bold;margin-left: 5%;margin-top: 15px">
                                {{ $registro->cidade ?? null }},
                                {{ date('d/m/Y', strtotime($registro->data)) ?? null }}
                            </label>
                        </div>
                        <div style="margin-left: 10PX;margin-right: 10PX;"><label class="form-label"
                                style="width: 570px;margin-top: 5PX;margin-bottom: 0px;font-size: 11px;">Emitente:</label><label
                                class="form-label"
                                style="width: 200px;margin-top: 5PX;margin-bottom: 0px;font-size: 11px;">CPF /
                                CNPJ:</label>


                            <label class="form-label"
                                style="margin-bottom: 0px;margin-top: 5PX;width: 170px;font-size: 11px;">RG /
                                INCRIÇÃO</label>


                            <label class="form-label d-table-cell"
                                style="height:44px;width: 570px;margin-right: 1%;margin-left: 1%;font-size: 16px;font-weight: bold;">
                                {{ $registro->emitente ?? null }}
                            </label>
                            <label class="form-label d-table-cell"
                                style="font-size: 16px;font-weight: bold;margin-left: 1%;margin-bottom: 0px;width: 205px;">
                                {{ $registro->cpf_emitente ?? null }}
                            </label>



                            <label class="form-label d-table-cell"
                                style="font-size: 16px;font-weight: bold;margin-left: 10px;margin-bottom: 0px;margin-right: 1%;width: 170px;">
                                {{ $registro->rg ?? null }}
                            </label>



                            <label class="form-label"
                                style="width: 95%;margin-right: 1%;margin-bottom: 0px;font-size: 11px;">Endereço:</label><label
                                class="form-label d-table-cell"
                                style="height:44px;width: 900px;margin-right: 1%;margin-bottom: 0px;font-size: 16px;font-weight: bold;height: 44px;">
                                {{ $registro->end_emitente ?? null }}
                            </label>
                        </div>
                        <div class="d-md-flex justify-content-md-center align-items-md-center" style="width: 100%;">
                            <label class="form-label d-md-flex justify-content-md-center align-items-md-center"
                                style="width: 50%;margin-top: 70PX;margin-right: 25%;margin-left: 25%;text-align: center;border-top: solid;margin-bottom: 2px;">Assinatura</label>
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
                            width: 300px;
                            height: 450px;
                            left: 0;
                            top: 0;
                        }
                    }
                </style>
            </div>
        </div>
    </x-layouts.layouts>
