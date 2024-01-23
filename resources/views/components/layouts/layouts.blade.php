<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    <link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>{{ $titulo ?? 'SGB RECIBOS' }}</title>
    @stack('css')
    @stack('table-css')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background:var(--cor_layout);width:200px">
            <div class="container-fluid d-flex flex-column p-0">
                <ul class="navbar-nav text-center text-light" id="accordionSidebar" style="text-align: center; ">
                    <li class="nav-item text-center" style="width: auto;">
                        <a href="{{ route('u_inicio') }}">
                            <img src="{{ URL::asset('/publico/img/Logo.png') }}"
                                style="max-width: 70%;height: 100%;padding: 10px;padding-bottom: 10px;">
                        </a>
                        <section class="text-center"
                            style="background: #ffffff;border-style: none;border-color: rgb(0,0,0);font-weight: 900;font-size:10px">
                            <label> {{ Auth::user()->name }}</label>
                            <br>
                            <label style="color:red">
                                {{ Auth::user()->admin == null ? 'USUARIO' : 'ADM' }}</label>
                            <br>
                            <label>{{ Auth::user()->fazenda->name ?? 'ERRO' }}</label>
                            </label>
                        </section>
                    </li>
                    {{-- logout --}}
                    <a href="{{ route('logout') }}" class="btn btn-primary btns w-100" type="buttom"
                        style="background-color:red;border:none;border-radius:0px;font-weight: 800; margin: 0 0 10px 0;">SAIR
                    </a>
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
            <p style="color:white;font-size:7px;text-align:left;height:10px;position:absolute">
                Feito por: WeslleyP.
            </p>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="width: 100%;background-color:white">
            <div id="content" style="width: 100%;">
                <x-alerts.time-alert-validator />
                <main style="margin:0px;height:auto;width: auto;">
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
