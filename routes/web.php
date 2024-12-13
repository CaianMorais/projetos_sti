<?php

use App\Http\Controllers\AdmEquipeController;
use App\Http\Controllers\AdmProjetosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

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
    });
});
