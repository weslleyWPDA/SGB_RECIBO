<x-layouts.layouts titulo="Editar">
    <nav>
        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
    </nav>
    <div class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center"
        style="margin: 5px;padding: 20px;border-style: none;border-radius: 10px;margin-top:30px">
        <form method="post" action="{{ route('fazendas.update', $fazenda->id) }}" class="text-center d-grid user"
            style="width: 450px;background: var(--cor_telas_faz);padding: 20px;border-radius: 10px;">
            @csrf
            @method('put')
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 22px;">EDITAR FAZENDA</h1>
            <div class="mb-3">
                <input id="name" required value="{{ $fazenda->name }}" class="form-control form-control-user upper"
                    type="text" placeholder="Usuario" name="nome" minlength="4"
                    style="color: rgb(0,0,0);font-size: 16px;text-align: left;height: 30px;border-radius: 8px;" />
            </div>
            {{-- botoes --}}
            <div style="margin-top:10px;width: 100%;background: rgba(255,255,255,0);padding: 10px;border-radius: 10px;">
                <x-botoes.botoes type='submit' color='green' label='EDITAR' width='150px' />
                <a href="javascript:history.back()">
                    <button type="button" class="btn btn-danger btns">CANCELAR</button>
                </a>
            </div>
        </form>
    </div>
</x-layouts.layouts>
