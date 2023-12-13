<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Recibos</title>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient-primary" style="background: rgb(52, 52, 20);">
    <div class="container" style="margin-top:5px">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0" style="height:350px">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <img class="flex-grow-1 bg-login-image" style="width: auto;height:400px"
                                    src="{{ URL::asset('publico/img/sgbrecibos.png') }}">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="font-size: 25px;font-weight: 900;">SGB
                                            RECIBOS</h4>
                                    </div>
                                    <hr>
                                    <form method="POST" action="{{ route('login_user') }}" class="user">
                                        @csrf
                                        <div class="mb-3">
                                            <input autocomplete="off" class="upper form-control "
                                                placeholder="Digite seu Usuario" name="name"
                                                style="width: 100%;height: 30px;text-align: left;font-weight: bold;font-size: 15px;color: rgb(0,0,0);"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control upper" type="password"
                                                placeholder="Digite sua Senha" name="password"
                                                style="width: 100%;height: 30px;text-align: left;font-weight: bold;font-size: 15px;color: rgb(0,0,0);"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <select name="fazenda_id" class="sel"
                                                style="width:100%;height:30px;text-align:center;color:black;height: 35px;font-size: 15x;font-weight: bold;border-radius:5px"
                                                required>
                                                <option hidden selected value=""></option>
                                                @foreach ($faz as $faz)
                                                    <option value="{{ $faz->id }}">{{ $faz->name }}</option>
                                                @endForeach
                                            </select>
                                        </div>
                                        <div class="text-center" style="width: 100%;margin-top:30px">
                                            <div class="btn-group text-center" role="group" style="width: 50%;">
                                                <button
                                                    class="lbtn btn btn-success text-center d-lg-flex justify-content-lg-center align-items-lg-center"
                                                    type="submit"
                                                    style="border:none;background: rgb(0,128,0);color:white;margin:8px;border-radius:5px">LOGIN
                                                </button>
                                            </div>
                                        </div>
                                        <hr />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <x-botoes.js-textoUpper />
    <x-select2.select2 />
</body>

</html>
<style>
    .lbtn:hover {
        transform: scale(1.08);
        opacity: 0.9;
    }
</style>
