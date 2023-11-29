<x-layouts.layouts titulo="Cadastrar">
    <nav>
        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
    </nav>
    <div class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center"
        style="margin: 5px;padding: 20px;border-style: none;border-radius: 10px;margin-top:30px">
        <form method="POST" action="{{ route('fazendas.store') }}" class="text-center d-grid user"
            style="width: 450px;background: var(--cor_telas_faz);padding: 20px;border-radius: 10px;">
            @csrf
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 22px;">CADASTRO DE FAZENDA</h1>
            {{-- fazenda --}}
            <div class="mb-3">
                <input id="fazenda" required class="form-control form-control-user upper" type="text"
                    autocomplete="off" onclick="text.toLowerCase()" placeholder="Fazenda" name="fazenda" minlength="4"
                    style="font-size: 16px;text-align: left;height: 30px;border-radius: 8px;color:black" />
            </div>
            {{-- botoes --}}
            <div style="margin-top:5px;width: 100%;background: rgba(255,255,255,0);padding: 10px;border-radius: 10px;">
                <x-botoes.botoes type='submit' color='green' label='CADASTRAR' width='150px' />
                <a href="javascript:history.back()">
                    <button type="button" class="btn btn-danger btns">CANCELAR</button>
                </a>
            </div>
        </form>
    </div>
</x-layouts.layouts>
