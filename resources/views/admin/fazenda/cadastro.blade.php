<x-layouts.layouts>
    <nav>
        <a href='{{ redirect()->back()->getTargetUrl() }}' class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <form method="POST" action="{{ route('fazendas.store') }}" class="align-middle text-center d-grid user "
        style="background: var(--cor_telas_faz);padding: 20px;width:50%;border-radius:5px;margin:50px 0 0 25%">
        @csrf
        <h1 style="color: #ffffff;font-weight: bold;font-size: 20px;">CADASTRO DE FAZENDA</h1>
        {{-- fazenda --}}
        <div class="mb-3">
            <input id="fazenda" required class="form-control upper" autocomplete="off" placeholder="Fazenda"
                name="fazenda" minlength="4" style="color: black" />
        </div>
        {{-- botoes --}}
        <div>
            <button type="submit" class="btn btn-success btns">CADASTRAR</button>
            <a href='{{ redirect()->back()->getTargetUrl() }}' class="btn btn-danger btns">CANCELAR</a>
        </div>
    </form>
</x-layouts.layouts>
