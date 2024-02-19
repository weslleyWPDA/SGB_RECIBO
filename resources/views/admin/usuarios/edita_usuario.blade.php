<x-layouts.layouts>
    <nav>
        <a href='{{ redirect()->back()->getTargetUrl() }}' class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="text-center"
        style="background:var(--cor_telas_user);padding: 20px;width:40%;border-radius:5px;margin:50px 0 0 30%">
        @csrf
        @method('put')
        <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 20px;">EDITAR USUARIO</h1>
        {{-- usuario --}}
        <label style="color:white;text-align:left;width:100%;font-size: 12px">Usuario:
            <input type="text" value="{{ $usuario->name }}" class="upper"
                style="height:30px;font-size:15px;width:100%; padding-left:5px" autocomplete="off" name="name">
        </label>
        {{-- password --}}
        <label style="color:white;text-align:left;width:100%;font-size: 12px">Senha:
            <input type="password" class="upper" style="height:30px;font-size:15px;width:100%; padding-left:5px"
                autocomplete="off" name="password">
        </label>
        {{-- checkbox admin --}}
        <label style="color:white;font-weight: bold">ADMIN
            <input type="checkbox" id="admin" {{ $usuario->admin == 1 ? 'checked' : '' }} name="admin"
                style="margin-top:15px;min-width: 20px;min-height: 20px" value="1">
        </label>
        {{-- select fazenda --}}
        <label style="color:white;text-align:left;width:100%;font-size: 12px">Fazenda:
            <select class="sel" name="fazenda_id" style="width:100%" required>
                <option selected value="{{ $usuario->fazenda_id }}">{{ $usuario->fazenda->name }}</option>
                @foreach ($fazenda as $faz)
                    <option value="{{ $faz->id }}">{{ $faz->name }}
                    </option>
                @endForeach
            </select>
        </label>
        {{-- botoes --}}
        <div style="margin-top: 15px">
            <button type="submit" class="btn btn-warning btns">EDITAR</button>
            <a href='{{ redirect()->back()->getTargetUrl() }}' class="btn btn-danger btns">CANCELAR</a>
        </div>
    </form>
    @push('css')
        <style>
            .wrapper {
                width: 100%;
                padding: 1px;
                height: auto;
            }

            .op {
                text-align: center;
                color: black;
                font-size: 16px;
                font-weight: bold;
            }
        </style>
    @endpush
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layouts>
