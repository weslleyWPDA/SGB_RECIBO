<x-layouts.layouts titulo="Recibos">
    <div class='tabeladiv' style="border-radius:10px;padding:5px;background:white;margin:10px;">
        <table id="datatable_tabela" class="display compact w-100">
            <h3 class="w-100 text-center" style="font-weight: bold;font-size:22px">
                RECIBOS
            </h3>
            <thead>
                <tr class="trtable">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    @push('script')
        <x-datatables.ajax_datatables tamanho='25' botoes='null' />
    @endpush
</x-layouts.layouts>
