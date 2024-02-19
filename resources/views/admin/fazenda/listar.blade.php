<x-layouts.layouts>
    <nav>
        <a href='{{ redirect()->back()->getTargetUrl() }}' type="button" class="btn btn-secondary btns">VOLTAR</a>
        <a href='{{ route('fazendas.create') }}' type="button" class="btn btn-success btns">CADASTRAR</a>
    </nav>
    <div class='tabeladiv'>
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            FAZENDAS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr>
                    <th>OPÇOES</th>
                    <th>FAZENDA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fazenda as $registro)
                    <tr>
                        <td>
                            <form style="display:inline-block" action="{{ route('fazendas.edit', $registro->id) }}"
                                method="POST">
                                @csrf
                                @method('get')
                                <button class="bi bi-pencil-square btns table_icon" title="Editar!"
                                    style="color:rgb(219, 168, 17) !important">
                                </button>
                            </form>
                            <form action="{{ route('fazendas.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();"class="bi bi-x-circle table_icon"
                                    style="color:red !important" title="Deletar!">
                                </button>
                            </form>
                        </td>
                        <td>{{ $registro->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-datatables.datatables tamanho='10' botoes='null' />
</x-layouts.layouts>
