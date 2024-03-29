<?php

use App\Http\Controllers\ConteudoController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\DesempenhoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanoEstudoController;
use App\Http\Controllers\AnotacaoController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\ExerciciosController;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\VisualizarEstudar;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
	return view('auth.login');
});

Route::get('/index', function () {
	return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::resource('conteudo', ConteudoController::class);
	Route::resource('atividade', AtividadesController::class);
	Route::resource('planoestudo', PlanoEstudoController::class);
	Route::resource('metaquestao', MetaController::class);
	Route::resource('desempenho', DesempenhoController::class);
	Route::resource('viewestudar', VisualizarEstudar::class);

	Route::resource('anotacao', AnotacaoController::class);
	Route::get('/addnotas/{id}', [AnotacaoController::class, 'addnotas'])->name('anotacao.addnotas');
	Route::post('/storeanotacao/{id}', [AnotacaoController::class, 'storeanotacao'])->name('anotacao.storeanotacao');

	Route::resource('exercicio', ExerciciosController::class);
	Route::resource('edital', EditalController::class);
	Route::post('/saveexer/{id}', [ExerciciosController::class, 'saveexer'])->name('exercicio.saveexer');
	/* 	Route::get('/finalizarexercicio/{id}', [ExerciciosController::class, 'finalizarexercicio'])->name('exercicio.finalizarexercicio'); */
	Route::post('/finalizar/{id}', [DesempenhoController::class, 'finalizar'])->name('desempenho.finalizar');
	Route::post('/finalizarexercicio/{id}', [DesempenhoController::class, 'finalizarexercicio'])->name('desempenho.finalizarexercicio');
	Route::post('/store/{id}', [MetaController::class, 'store'])->name('metaquestao.store');
	Route::get('/showAtividade/{id}', [AtividadesController::class, 'showAtividade'])->name('atividade.showAtividade');
	Route::get('/finalizaratividade/{id}', [AtividadesController::class, 'finalizaratividade'])->name('atividade.finalizaratividade');
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;

/* Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth'); */

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
