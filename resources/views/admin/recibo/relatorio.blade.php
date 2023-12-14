<x-layouts.layouts titulo='RELATÓRIO'>
    <nav>
        <x-botoes.botao_href color='gray' label='VOLTAR' link="{{ route('u_inicio') }}" />
    </nav>
    <div class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center"
        style="border-style: none;border-radius: 10px; margin-top:30px">
        <form method="post" action="{{ route('adm_rec_rela_ac') }}" class="text-center d-grid user"
            style="width: 80%;background: var(--cor_telas_relatorio);padding: 10px;border-radius: 10px;">
            @csrf
            <h1 style="color: #ffffff;font-weight: bold;font-size: 25px;width: 80%;margin-right: 10%;margin-left: 10%;">
                RELATÓRIO DE RECIBOS</h1>
            <hr style="width: 80%;margin-right: 10%;margin-left: 10%;" />
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;height: 40%; margin-top:10px ">
                {{-- select fazenda --}}
                <div class="wrapper" style="width: 100%">
                    <div style="display: {{ Auth::user()->admin == null ? 'none' : '' }}">
                        <label style="color:aliceblue;font-weight: bold;width: 100%">
                            Selecione a Fazenda
                        </label>
                        <select style="text-align:center;color:black;width:55%" name="dfaz" class=" sel">
                            <option hidden selected value="%">TODOS</option>
                            @foreach ($fazenda as $faz)
                                <option class="op" value="{{ $faz->id }}">{{ $faz->name }}</option>
                            @endForeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;">
                <label class="form-label d-inline-block"
                    style="width: 28%;border-color: rgb(0,0,0);color: rgb(255,255,255);height: 10px;">Data
                    inicio:
                </label>
                <label class="form-label d-inline-block"
                    style="width: 28%;border-color: rgb(0,0,0);color: rgb(255,255,255);height: 10px;">Data
                    fim:
                </label>
            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;height: 40%; ">
                <input type="date" class="form-control d-inline-block form-control-user text-center" name="d1"
                    style="color: rgb(0,0,0);font-size: 18px;text-align: left;height: 30px;;border-radius: 0px;width: 25%;
                    margin-left:0px;margin-right:3px;"
                    required />
                <label style="color: white;margin-left:5px;margin-right:5px;">Até</label>
                <input type="date" class="form-control d-inline-block form-control-user text-center" name="d2"
                    style="color: rgb(0,0,0);font-size: 18px;text-align: left;height: 30px;border-radius: 0px;width: 25%;margin-left:3px;margin-right:3px;"
                    required />
            </div>
            {{-- botoes --}}
            <div style="margin-top:10px;width: 100%;background: rgba(255,255,255,0);padding: 10px;border-radius: 10px;">
                <button style="border:none;font-weight: 800;margin:5px;color:white" type="submit"
                    class="btn btn-success btns botoes">GERAR</button>
                <a style="border:none;font-weight: 800;margin:5px;color:white" href="{{ route('u_inicio') }}"
                    type="button" class="btn btn-danger btns botoes">CANCELAR</a>
            </div>
        </form>
        @push('css')
            <style>
                .wrapper {
                    width: 56%;
                    padding: 1px;
                    height: auto;
                }
            </style>
        @endpush
        @push('script')
            <x-scripts.select-autocomplete select='js-example-basic-single' />
            <x-select2.select2 />
        @endpush
    </div>
</x-layouts.layouts>
