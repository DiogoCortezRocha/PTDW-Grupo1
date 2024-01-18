<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UnidadeCurricularController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\RestricaoController;
use App\Http\Controllers\BlocoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/ciclos/editar/{id}', 'UnidadeCurricularController@editar')->name('ciclos.editar');
Route::delete('/ciclos/remover/{id}', 'UnidadeCurricularController@remover')->name('ciclos.remover');
Route::get('/ciclos/adicionar', 'CiclosController@adicionar')->name('ciclos.adicionar');
Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
		Route::get('formulario', ['as' => 'pages.formulario', 'uses' => 'App\Http\Controllers\PageController@formulario']);
        Route::get('horarios', ['as' => 'pages.horarios', 'uses' => 'App\Http\Controllers\PageController@horarios']);
        Route::get('detalhesDocente', ['as' => 'pages.detalhesDocente', 'uses' => 'App\Http\Controllers\PageController@detalhesDocente']);
		Route::get('detalhesUnidadesCurriculares', ['as' => 'pages.detalhesUnidadesCurriculares', 'uses' => 'App\Http\Controllers\PageController@detalhesUnidadesCurriculares']);
        Route::get('unidadesCurriculares', ['as' => 'pages.unidadesCurriculares', 'uses' => 'App\Http\Controllers\UnidadeCurricularController@Index']);
        Route::get('ciclosEstudos', ['as' => 'pages.ciclosEstudos', 'uses' => 'App\Http\Controllers\PageController@ciclosEstudos']);

    });

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('detalhesUnidadesCurriculares/{codigo}',[App\Http\Controllers\UnidadeCurricularController::class,'show'])->name('detalhesuc');

Route::post('/detalhesUnidadesCurriculares/{codigo}/inserir-docenteresponsavel', [App\Http\Controllers\UnidadeCurricularController::class, 'adiciona_docenteresponsavel_uc'])->name('inserirdocenteresponsavel.store');
Route::delete('/detalhesUnidadesCurriculares/{numeroFuncionario}/{codigoUC}', [App\Http\Controllers\Utilizador_UnidadeCurricular::class,'destroy_docente_responsavel'])->name('eleminadocenteresponsavel');
//Route::get('detalhesUnidadesCurricularesfuncionarios/{codigo}',[App\Http\Controllers\Utilizador_UnidadeCurricular::class,'show'])->name('funcionario');
Route::post('/restricoes', 'App\Http\Controllers\RestricaoController@store')->name('restricoes.store');
Route::get('/inserir_uc',[App\Http\Controllers\UnidadeCurricularController::class,'inserir_uc'])->name('inserir_uc');
Route::post('inserir_uc/adicionar', 'App\Http\Controllers\UnidadeCurricularController@store')->name('inserir_uc.store');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');
Route::get('/PaginaInical', 'App\Http\Controllers\PageController@paginaInicial')->name('dashboardPage');
Route::get('/import', [App\Http\Controllers\UserController::class,'import']);
Route::post('/import', [App\Http\Controllers\UserController::class,'storeImport']);

Route::put('/formularioEdit/{id}', 'App\Http\Controllers\UnidadeCurricularController@update')->name('formularioEdit');

