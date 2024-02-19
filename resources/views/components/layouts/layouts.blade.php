<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    <link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>{{ $titulo ?? env('APP_NAME') }}</title>
    @stack('css')
    @stack('table-css')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar" style="background:var(--cor_layout);width: 200px">
            <div class="container-fluid d-flex flex-column p-0">
                <ul class="navbar-nav text-center text-light" id="accordionSidebar">
                    <a href="{{ route('u_inicio') }}">
                        <img src="{{ URL::asset('publico/img/icon.png') }}"
                            style="width: 50%;padding-bottom: 10px;margin-top:15px" />
                    </a>
                    <li class="text-center">
                        <section style="background: #ffffff;font-weight: 700">
                            <div>
                                <label style="font-size:10px !important">
                                    {{ Auth::user()->name }}
                                    <br>
                                    <label style="color:red">{{ Auth::user()->admin == null ? 'USUARIO' : 'ADM' }}
                                    </label>
                                    <br>
                                    {{ Auth::user()->fazenda->name ?? null }}
                                </label>
                            </div>
                        </section>
                        <a href="{{ route('logout') }}" class="btn btn-primary btns w-100" type="buttom"
                            style="background-color:red;border:none;border-radius:0px;font-weight: 800; margin: 0 0 10px 0;">SAIR
                        </a>
                    </li>
                    {{-- dropdown --}}
                    <x-drop-navbar.drop-navbar label='RECIBOS'>
                        <a class="dropdown-item" href="{{ route('recibo.create') }}">Novo</a>
                        <a class="dropdown-item" href="{{ route('recibo.index') }}">Recibos</a>
                    </x-drop-navbar.drop-navbar>
                    <x-drop-navbar.drop-navbar label='RELATÓRIO'>
                        <a class="dropdown-item" href="{{ route('adm_rec_rela') }}">Recibos</a>
                    </x-drop-navbar.drop-navbar>
                    <div style="display: {{ Auth::user()->admin == null ? 'none' : '' }}">
                        <x-drop-navbar.drop-navbar label='CONFIGURAÇÕES'>
                            <a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a>
                            <a class="dropdown-item" href="{{ route('fazendas.index') }}">Fazendas</a>
                        </x-drop-navbar.drop-navbar>
                    </div>
                </ul>
            </div>
            <p style="color:white;font-size:10px;text-align:left;height:10px;position:absolute">
                Feito por: WeslleyP.
            </p>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="width: 100%;background-color:white">
            <div id="content" style="width: 100%;">
                <x-alerts.time-alert-validator />
                <main style="width: 100%">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <x-botoes.js-textoUpper />
    @stack('script')
    @stack('table-script')
    @include('sweetalert::alert')
</body>

</html>
