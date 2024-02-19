<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <div class="custom-flex-container">
        <form method="post" action="{{ route('adm_rec_rela_ac') }}" class="custom-form">
            @csrf
            <h1 class="titulo"> RELATÓRIO DE RECIBOS</h1>
            <hr />
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3">
                {{-- select fazenda --}}
                <div class="wrapper w-100">
                    <div {{ Auth::user()->admin == null ? 'hidden' : '' }}>
                        <label class="w-100 labels">Selecione a Fazenda</label>
                        <select name="dfaz" class="sel" style="width: 55%">
                            <option hidden selected value="%">TODOS</option>
                            @foreach ($fazenda as $faz)
                                <option class="op" value="{{ $faz->id }}">{{ $faz->name }}</option>
                            @endForeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="date-range-container mb-3">
                <label class="date-label labels">Data inicio:</label>
                <label class="date-label labels">Data fim:</label>
            </div>
            <div class="date-input-container mb-3">
                <input type="date" class="custom-input text-center" name="d1" required />
                <span class="date-separator labels">Até</span>
                <input type="date" class="custom-input text-center" name="d2" required />
            </div>
            {{-- botoes --}}
            <div class="button-container">
                <button type="submit" class="custom-button btn btn-success btns">GERAR</button>
                <a href='{{ redirect()->back()->getTargetUrl() }}' class="btn btn-danger btns">CANCELAR</a>
            </div>
        </form>
        @push('css')
            <link href="{{ URL::asset('publico/css/relatorio.css') }}" rel="stylesheet">
        @endpush
        @push('script')
            <x-select2.select2 />
        @endpush
    </div>
</x-layouts.layouts>
