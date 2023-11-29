<x-layouts.layouts titulo="FAZENDAS">
    <nav>
        <x-botoes.botao_href color='gray' label='VOLTAR' link="{{ route('u_inicio') }}" />
        <x-botoes.botao_href color='green' label='CADASTRAR' link="{{ route('fazendas.create') }}" />
    </nav>
    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:10px;background:white">
        <label style='font-size:2vw;color:black;text-align:center;width:100%;font-weight:600'>
            FAZENDAS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th style="text-align: center">OPÇOES</th>
                    <th style="text-align: center">FAZENDA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fazenda as $registro)
                    <tr>
                        <td class="tdtable">
                            <form style="display:inline-block" action="{{ route('fazendas.edit', $registro->id) }}"
                                method="POST">
                                @csrf
                                @method('get')
                                <button class="bi bi-pencil-square table-icon" title="Editar!"
                                    style="background-color:#00000000;color:rgb(219, 168, 17);font-size: 20px;display:inline-block;margin-right:10px">
                                </button>
                            </form>
                            <form action="{{ route('fazendas.destroy', $registro->id) }}" method="POST"
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function perguntaDelete() {
                return confirm('DESEJA REALMENTE DELETAR ?');
            }
        </script>
        <x-datatables.datatables tamanho='10' botoes='null' />
        </x-layouts.adm_layouts>
