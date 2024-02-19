<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' class="btn btn-secondary btns">VOLTAR</a>
        <a href='{{ route('usuarios.create') }}' class="btn btn-success btns">CADASTRAR</a>
    </nav>
    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:10px;background:white">
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            USUARIOS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th class="text-center">OPÇOES</th>
                    <th class="text-center">USUARIO</th>
                    <th class="text-center">ACESSO</th>
                    <th class="text-center">FAZENDA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $registro)
                    <tr>
                        <td class="tdtable" style="width: 15%">
                            <form style="display:inline-block" action="{{ route('usuarios.edit', $registro->id) }}"
                                method="POST">
                                @csrf
                                @method('get')
                                <button class="bi bi-pencil-square table-icon" title="Editar!"
                                    style="background-color:#00000000;color:rgb(219, 168, 17);font-size: 20px;display:inline-block;margin-right:10px">
                                </button>
                            </form>
                            <form action="{{ route('usuarios.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();"class="bi bi-x-circle table-icon"
                                    style="background-color:#00000000;font-size:20px;margin:0px;padding:0px;color:red"
                                    title="Deletar!">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->name }}</td>
                        <td class="tdtable">{{ $registro->admin == 1 ? 'ADMIN' : 'USUARIO' }}</td>
                        <td class="tdtable">{{ $registro->fazenda->name ?? 'ADMINISTRADOR' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='10' botoes='null' />
        @endpush
</x-layouts.layouts>
