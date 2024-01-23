<x-layouts.layouts titulo="RECIBOS {{ Auth::user()->fazenda->name }}">
    <nav>
        <x-botoes.botao_href color='gray' label='VOLTAR' link="{{ route('adm_rec_rela') }}" />
    </nav>
    <div class='tabeladiv' style="border-radius:10px;padding:5px;margin:10px;background:white">
        <table id="datatable_tabela" class="display compact w-100">
            <thead>
                <tr class="trtable">
                    <th>NUMERO</th>
                    <th>PAGADOR</th>
                    <th>EMITENTE</th>
                    <th>VALOR</th>
                    <th>DATA</th>
                    <th>FAZENDA</th>
                    <th>REFERENTE</th>
                    <th hidden></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recibo as $registro)
                    <tr>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->recebi }}</td>
                        <td class="tdtable">{{ $registro->emitente }}</td>
                        <td class="tdtable">{{ number_format($registro->valor, 2, ',', '.') }} </td>
                        <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data)) }}</td>
                        <td class="tdtable">{{ $registro->fazenda->name ?? 'ADMIN' }}</td>
                        <td class="tdtable referente">{{ $registro->referente }}</td>
                        <td hidden class="tdtable">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('script')
        <x-datatables.rela_datatables tamanho='50' botoes='dom' />
    @endpush
    <style>
        .referente {
            font-size: 10px !important
        }
    </style>
</x-layouts.layouts>
