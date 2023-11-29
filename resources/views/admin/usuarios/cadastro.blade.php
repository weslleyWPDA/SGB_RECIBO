<x-layouts.layouts titulo="Usuario">
    <nav>
        <a href="javascript:history.back()" style="text-decoration: none">
            <x-botoes.botoes type='buttom' color='gray' label='VOLTAR' />
        </a>
    </nav>
    <div class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center"
        style="margin: 5px;padding: 20px;border-style: none;border-radius: 10px;margin-top:2px">
        <form method="POST" action="{{ route('usuarios.store') }}" class="text-center d-grid user"
            style="width: 450px;background: var(--cor_telas_user);padding: 20px;border-radius: 10px;">
            @csrf
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 2vw;">CADASTRO DE USUARIO</h1>
            {{-- usuario --}}
            <div class="mb-3">
                <input id="name" required class="form-control upper" type="text" autocomplete="off"
                    onclick="text.toLowerCase()" placeholder="Usuario" name="name" minlength="4"
                    style="color: rgb(0,0,0);font-size: 18px;text-align: left;height: 30px;" />
            </div>
            {{-- password --}}
            <div class="mb-3">
                <input id="password" required class="form-control" type="password" placeholder="Senha" name="password"
                    minlength="4" style="color: rgb(0,0,0);font-size: 18px;text-align: left;height: 30px;" />
            </div>
            {{-- select acesso --}}
            <div class="wrapper">
                <label style="color:aliceblue;margin-bottom:1px;margin-top:2px;font-weight: bold;">
                    Nivel de Acesso
                </label>
                <select style="text-align:center;color:black;font-size: 15px;font-weight: 600;height:30px;padding:0px"
                    name="admin" class="form-control">
                    <option hidden selected value="">SELECIONE</option>
                    <option value="" class="select2-results__option">USUARIO</option>
                    <option value="1" class="select2-results__option">ADMINISTRADOR</option>
                </select>
            </div>
            {{-- select fazenda --}}
            <div class="wrapper">
                <label style="color:aliceblue;margin-top:15px;font-weight: bold;">
                    Selecione a Fazenda
                </label>
                <select style="text-align:center;color:black;font-size: 15px;" name="fazenda_id"
                    class="form-control sel">
                    <option hidden selected value="">SELECIONE</option>
                    @foreach ($fazenda as $faz)
                        <option value="{{ $faz->id }}">{{ $faz->name }}</option>
                    @endForeach
                </select>
            </div>
            {{-- botoes --}}
            <div style="margin-top:10px;width: 100%;background: rgba(255,255,255,0);padding: 10px;border-radius: 10px;">
                <x-botoes.botoes type='submit' color='green' label='CADASTRAR' width='150px' />
                <a href="javascript:history.back()">
                    <button type="button" class="btn btn-danger btns">CANCELAR</button>
                </a>
            </div>
        </form>
    </div>
    @push('css')
        <style>
            .wrapper {
                width: 100%;
                padding: 1px;
                height: auto;
            }
        </style>
    @endpush
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layouts>
