{{-- css datatables --}}
@push('table-css')
    <link href="{{ URL::asset('/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/tabelas.css') }}" />
@endpush
@push('table-script')
    {{-- script tabela --}}
    <script src="{{ URL::asset('/datatables/script/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable_tabela').DataTable({
                language: {
                    sUrl: "{{ URL::asset('datatables/pt_BR.json') }}"
                },
                "iDisplayLength": {{ $tamanho ?? '10' }},
                scrollX: true,
                scrollY: "350px",
                scrollCollapse: true,
            });
        });

        function perguntaDelete() {
            return confirm('DESEJA REALMENTE DELETAR ESSE REGISTRO ?');
        }
    </script>
@endpush
