{{-- css datatables --}}
@push('table-css')
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/tabelas.css') }}" />
    <link href="{{ URL::asset('/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('table-script')
    {{-- script tabela --}}
    <script src="{{ URL::asset('/datatables/script/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/dataTables.bootstrap5.min.js') }}"></script>
    {{-- script de formatar data na tabela com server side --}}
    <script src="{{ URL::asset('/datatables/script/moment.min.js') }}"></script>
    {{-- script tabela botoes --}}
    {{-- <script src="{{ URL::asset('/datatables/script/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/vfs_fonts.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/buttons.print.min.js') }}"></script> --}}

    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            // DataTable
            $('#datatable_tabela').DataTable({
                language: {
                    sUrl: "{{ URL::asset('datatables/pt_BR.json') }}"
                },
                {{ $botoes ?? 'null' }}: 'Bfrtip',
                buttons: [
                    // para chamar os botoes na variavel e so colocar dom // 'copyHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                ],
                iDisplayLength: {{ $tamanho ?? '10' }},
                order: [
                    [1, 'desc']
                ], //[ 1, 'asc' ]], //ordenaçao das colunas, nesse caso esta por ID
                paginate: true,
                filter: true,
                scrollX: true,
                scrollY: "350px",
                scrollCollapse: true,
                processing: false,
                serverSide: true,
                ajax: "{{ route('recibo_ajax') }}",
                columns: [{
                        title: 'OPÇÕES',
                        data: 'id',
                        name: 'recibos.id',
                        width: 'auto',
                        render: function(data) {
                            return '<form action="{{ route('recibo.show', 'pdf') }}" method="POST" style="display:inline-block">@csrf @method('GET')<button class="bi bi-printer tableico botoes" title="Imprimir!" name="id" value="' +
                                data +
                                '" style="background-color:rgba(0,0,0,0);font-size:19px;color:blue"></button></form>' +
                                // editar
                                '<form action="{{ route('recibo.edit', 'edit') }}" method="POST" style="margin: 0 10px 0 10px;display:inline-block">@csrf @method('get')<button class="bi bi-pencil-square tableico botoes" title="Editar!" name="id" value="' +
                                data +
                                '" style="background-color:rgba(0,0,0,0);font-size:19px;color:rgb(219, 168, 17)"></button></form>' +
                                // deletar
                                '<form action="{{ route('recibo.destroy', 'delete') }}" method="POST" style="display:inline-block">@csrf @method('delete')<button onclick="return perguntaDelete();"class="bi bi-x-circle tableico botoes" title="Deletar!" name="id" value="' +
                                data +
                                '"style="background-color:rgba(0,0,0,0);font-size:19px;color:red; display:{{ Auth::user()->admin > null ? '' : 'none' }}"></button></form>'
                        },
                    }, {
                        title: 'ID',
                        data: 'id',
                        name: 'recibos.id',
                        width: 'auto',
                    },
                    {
                        title: 'RECEBI',
                        data: 'recebi',
                        name: 'recibos.recebi',
                        width: 'auto',
                        render: function(data, type, row) {
                            return data.substr(0, 20) + '..';
                        }
                    },
                    {
                        data: "valor",
                        title: 'VALOR',
                        name: 'recibos.valor',
                        width: 'auto',
                        render: $.fn.dataTable.render.number('.', ',', 2, 'R$ '),
                    },
                    {
                        title: 'EMITENTE',
                        data: 'emitente',
                        name: 'recibos.emitente',
                        width: 'auto',
                        render: function(data, type, row) {
                            return data.substr(0, 20) + '..';
                        }
                    },
                    {
                        title: 'DATA',
                        data: "data",
                        name: 'recibos.data',
                        width: 'auto',
                        render: DataTable.render.datetime('DD/MM/YYYY'),

                    },
                    {
                        title: 'FAZENDA',
                        data: "fazname",
                        name: 'fazendas.name',
                        width: 'auto',
                        visible: {{ Auth::user()->admin > null ? 'true' : 'false' }},

                    }
                ],

            });
        });

        function perguntaDelete() {
            return confirm('Deseja realmente DELETAR o registro?');
        }
    </script>
@endpush
