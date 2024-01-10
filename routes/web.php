<?php

use App\Http\Controllers\FazendaAdmCont;
use App\Http\Controllers\RelatoriosCont;
use App\Http\Controllers\ULoginController;
use App\Http\Controllers\UserReciboCont;
use App\Http\Controllers\UsuarioAdmCont;
use Illuminate\Support\Facades\Route;

// sessao do usuario
Route::group(['middleware' => 'UsuarioLogin',], function () {
    Route::get('/inicio', [ULoginController::class, 'u_inicio'])->name('u_inicio');
    // recibo
    Route::resource('recibo', UserReciboCont::class);
    Route::get('/retorno/{user_id}', [UserReciboCont::class, 'retorno'])->name('retorno');
    // Route::get('/teste', [UserReciboCont::class, 'teste'])->name('teste');

    // recibo ajax listar
    Route::get('/listar/listarajax', [UserReciboCont::class, 'recibo_ajax'])->name('recibo_ajax');
    //relatorio e recibo
    Route::get('/relatorio', [RelatoriosCont::class, 'tela_relatorio'])->name('adm_rec_rela');
    Route::post('/relatorio/lista', [RelatoriosCont::class, 'tab_relatorio'])->name('adm_rec_rela_ac');
});
// sessao do ADM
Route::group(['middleware' => 'AdminLogin',], function () {
    // usuarios
    Route::resource('usuarios', UsuarioAdmCont::class);
    // fazenda
    Route::resource('fazendas', FazendaAdmCont::class);
});
// Geral
Route::get('/logout', [ULoginController::class, 'logout'])->name('logout');
Route::post('/login_user', [ULoginController::class, 'login_user'])->name('login_user');
Route::get('/', [ULoginController::class, 'login'])->name('login');
