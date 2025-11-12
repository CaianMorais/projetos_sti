<?php

use App\Http\Controllers\AdmContatoProjetoController;
use App\Http\Controllers\AdmContatosArmazenadosController;
use App\Http\Controllers\AdmEquipeController;
use App\Http\Controllers\AdmPerfisController;
use App\Http\Controllers\AdmProjetosController;
use App\Http\Controllers\AdmSolicitacaoContatosController;
use App\Http\Controllers\AdmTermoConsentimentoController;
use App\Http\Controllers\AdmUsuariosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CapdaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TermoConsentimentoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'pt_BR'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});


Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');
Route::post('/contato/enviar', [ContatoController::class, 'store'])->name('contato.enviar');

Route::get('/projetos', [ProjetosController::class, 'projetos'])->name('projetos');
Route::get('/projetos/{id}', [ProjetosController::class, 'ver_projeto'])->name('projetos.ver_projeto');
Route::post('/projetos/enviar_contato', [ProjetosController::class, 'contato_projeto'])->name('projetos.enviar_contato');

Route::get('quem_somos', [SobreController::class, 'sobre'])->name('quem_somos');

Route::get('equipe', [EquipeController::class, 'equipe'])->name('equipe');
Route::get('equipe/{id}', [EquipeController::class, 'json_equipe'])->name('equipe.ver_equipe');

Route::get('capda', [CapdaController::class, 'capda'])->name('capda');

Route::get('termo', [TermoConsentimentoController::class, 'termo'])->name('termo');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::group(['middleware' => ['check.role:2,3']], function() {
    Route::prefix('admin')->group(function () {
        Route::get('menu', [AdmProjetosController::class,'menu'])->name('admin.menu');

        //PROJETOS E FOTOS DOS PROJETOS
        Route::get('/projetos', [AdmProjetosController::class,'projetos'])->name('admin.projetos');
        Route::get('projetos/criar', [AdmProjetosController::class,'criar'])->name('admin.criar');
        Route::post('projetos/store', [AdmProjetosController::class,'store'])->name('admin.projetos.store');
        Route::get('projetos/editar/{projeto}', [AdmProjetosController::class,'editar_projeto'])->name('admin.projetos.editar');
        Route::put('projetos/editar/{id}', [AdmProjetosController::class, 'update_projeto'])->name('admin.projeto.update');
        Route::delete('delete/fotos/{foto}', [AdmProjetosController::class, 'destroy_foto'])->name('admin.projetos.fotos.destroy');
        Route::get('projetos/delete/{projeto}', [AdmProjetosController::class,'destroy_projeto'])->name('admin.projetos.delete');

        // EQUIPE
        Route::get('equipe', [AdmEquipeController::class,'equipe'])->name('admin.equipe');
        Route::get('equipe/criar', [AdmEquipeController::class,'criar'])->name('admin.equipe.criar');
        Route::post('equipe/store', [AdmEquipeController::class,'store'])->name('admin.equipe.store');
        Route::get('equipe/editar/{id}', [AdmEquipeController::class,'editar'])->name('admin.equipe.editar');
        Route::put('equipe/update/{id}', [AdmEquipeController::class,'update'])->name('admin.equipe.update');
        Route::get('equipe/delete/{id}', [AdmEquipeController::class,'destroy'])->name('admin.equipe.destroy');

        Route::get('solicitacoes_contato', [AdmSolicitacaoContatosController::class,'solicitacoes'])->name('admin.solicitacoes_contato');
        Route::get('solicitacoes_contato/ver/{id}', [AdmSolicitacaoContatosController::class, 'ver'])->name('admin.ver_solicitacao_contato');

        Route::get('contatos_por_projeto', [AdmContatoProjetoController::class,'projetos_contato'])->name('admin.contatos_por_projeto');
        Route::get('ver_contato_do_projeto/{id}', [AdmContatoProjetoController::class,'ver_contato_do_projeto'])->name('admin.ver_contato_do_projeto');

        Route::get('todos_contatos', [AdmContatoProjetoController::class,'todos_contatos'])->name('admin.todos_contatos');
        Route::get('contato_por_projeto/ver/{id}', [AdmContatoProjetoController::class,'ver_contato_todos_projetos'])->name('admin.ver_contato_projeto');
    });
});

Route::group(['middleware' => ['check.role:3']], function () {
    Route::prefix('admin')->group(function () {
        //USUARIOS
        Route::get('usuarios', [AdmUsuariosController::class,'usuarios'])->name('admin.usuarios');
        Route::post('usuarios/{id}/send-reset-link', [AdmUsuariosController::class,'sendResetLink'])->name('admin.usuarios.sendResetLink');
        Route::get('usuarios/criar', [AdmUsuariosController::class, 'criar'])->name('admin.usuarios.criar');
        Route::post('usuarios/store', [AdmUsuariosController::class, 'store'])->name('admin.usuarios.store');
        Route::get('usuarios/editar/{id}', [AdmUsuariosController::class,'editar'])->name('admin.usuarios.editar');
        Route::post('usuarios/update/{id}', [AdmUsuariosController::class,'update'])->name('admin.usuarios.update');

        //PERFIS
        Route::get('perfis', [AdmPerfisController::class,'perfis'])->name('admin.perfis');

        //DADOS ARMAZENADOS
        Route::get('dados_armazenados', [AdmContatosArmazenadosController::class,'dados'])->name('admin.dados_armazenados');
        Route::get('dados_armazenados/delete/{id}', [AdmContatosArmazenadosController::class,'destroy'])->name('admin.dados_armazenados.delete');

        //TERMOS DE CONSENTIMENTO
        Route::get('termo', [AdmTermoConsentimentoController::class,'termo'])->name('admin.termo');
        Route::get('termo/editar', [AdmTermoConsentimentoController::class,'editar_termo'])->name('admin.editar_termo');
        Route::post('termo/update', [AdmTermoConsentimentoController::class,'update'])->name('admin.atualizar_termo');
    });
});
