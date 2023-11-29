<x-layouts.layouts titulo="Recibos">
    <div class='tabeladiv' style="border-radius:10px;padding:5px;background:white;margin:10px;">
        <table id="datatable_tabela" class="display compact" style="width:100%;">
            <h3 style="text-align:center;color: #000000;font-weight: bold;font-size:22px;width: 100%;">
                RECIBOS</h3>
            <thead>
                <tr class="trtable">
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                </tr>
            </thead>
            <tbody style="text-align: center">
            </tbody>
        </table>
    </div>

    @push('script')
        <x-datatables.ajax_datatables tamanho='10' botoes='null' />
    @endpush
</x-layouts.layouts>
