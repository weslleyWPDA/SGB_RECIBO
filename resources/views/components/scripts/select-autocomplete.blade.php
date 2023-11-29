{{-- https://select2.org/   site onde tem o repositorio do autocomplete --}}
@push('css')
<link rel="stylesheet" href="{{ URL::asset('/publico/css/select2.min.css') }}" />
@endpush
@push('script')
<script src="{{ URL::asset('/publico/js/select2.min.js') }}"></script>
@endpush
<script>
    $(document).ready(function() {

        $('.{{$select}}').select2(
            {
                minimumResultsForSearch: Infinity//ocultar opçao de pesquisar no select

            },{
                language: "ptbr"
            },


        );
    });
</script>
<style>
    .select2-selection--single {
        padding-top: 7px;
        padding-bottom: 5px;
    }

    .select2-selection {
        font-weight: 700;
        height: 45px !important;
        border-radius: 8px !important;
        margin-right: 3px;
        margin-left: 3px;
    }

    .select2-results__option--selectable {
        font-weight: 600;
        height: 35px !important;
        font-size: 15px;
        text-align: center !important;

    }
</style>
