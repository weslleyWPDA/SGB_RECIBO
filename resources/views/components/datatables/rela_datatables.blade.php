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
    {{-- script tabela botoes --}}
    <script src="{{ URL::asset('/datatables/script/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/vfs_fonts.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/buttons.print.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable_tabela').DataTable({
                language: {
                    sUrl: "{{ URL::asset('datatables/pt_BR.json') }}"
                },
                "iDisplayLength": {{ $tamanho ?? '10' }},
                paginate: true,
                filter: true,
                scrollX: true,
                scrollY: "300px",
                scrollCollapse: true,
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

            });
        });

        function perguntaDelete() {
            return confirm('DESEJA REALMENTE DELETAR ESSE REGISTRO ?');
        }
    </script>
@endpush
