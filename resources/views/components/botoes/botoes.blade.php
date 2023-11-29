<link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
<button class="btn btn-primary btns botoes" type="{{ $type }}"
    style="background-color:{{ $color }};text-align: center;width: {{ $width ?? 'auto' }}; color:#dce4f5;
    margin: 5px;border:none;font-weight: 800;
">{{ $label }}
</button>
