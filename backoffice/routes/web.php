<?php

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


/*irrelevante*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*pagina inicial*/
Route::get('/', 'PagesController@index')->name('index');


/*Route::group(array(), function() {*/
	Route::resource('index','PagesController');
	Route::resource('curso', 'CursoControllerBack');
    Route::resource('disciplina', 'DisciplinaControllerBack');
    Route::resource('horario', 'HorarioControllerBack');
    Route::resource('user', 'UsersControllerBack');
    Route::resource('utilizador', 'UtilizadoresControllerBack');
    Route::resource('evento', 'EventoControllerBack');
    Route::resource('documento', 'DocumentoControllerBack');
    Route::resource('financa', 'FinancasControllerBack');
/*});*/