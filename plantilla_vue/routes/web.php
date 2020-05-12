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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('index');
});

Route::any('/menu', function () {
    return view('main_menu');
});

/*
Route::resource('/quiz','PreguntasController'); */
Route::get('/quiz',function(){
    return view('csgoquiz.menu');
});

Route::get('/about', function () {
    return view('csgoquiz.about');
});

Route::get('/milionari', function () {

    return view('milionare.menu');
});

Route::post('/about','Controller@sendmail');

//Route::resource('/game', 'PreguntasController');
// game mode
Route::get('/game', 'GameController@index');
Route::get('/game_mode', 'GameController@ingame');

// MILIONARI
Route::get('/millonario/facil', 'MillionareController@facil');
Route::get('/millonario/normal', 'MillionareController@normal');
Route::get('/millonario/dificil', 'MillionareController@dificil');
