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
/*
Route::resource('/quiz','PreguntasController'); */
Route::get('/quiz',function(){
    return view('quiz.menu');
});

Route::get('/about', function () {
    return view('quiz.about');
});

Route::post('/about','Controller@sendmail');

Route::resource('/game', 'PreguntasController');