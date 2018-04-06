<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$app->get('/', function () use ($app) {
    return $app->version();
});*/

$app->get('/akun','AkunController@index');
$app->get('/akun/{id}','AkunController@show');
$app->post('/akun','AkunController@store');
$app->put('/akun/{id}','AkunController@update');
$app->delete('/akun/{id}','AkunController@destroy');

$app->get('/posisi','PosisiController@index');
$app->get('/posisi/{id}','PosisiController@show');
$app->post('/posisi','PosisiController@store');
$app->put('/posisi/{id}','PosisiController@update');
$app->delete('/posisi/{id}','PosisiController@destroy');

$app->get('/score','ScoreController@index');
$app->get('/score/{id}','ScoreController@show');
$app->post('/score','ScoreController@store');
$app->put('/score/{id}','ScoreController@update');
$app->delete('/score/{id}','ScoreController@destroy');

$app->get('/soal','SoalController@index');
$app->get('/soal/{id}','SoalController@show');
$app->post('/soal','SoalController@store');
$app->put('/soal/{id}','SoalController@update');
$app->delete('/soal/{id}','SoalController@destroy');

$app->get('/status','StatusPlayerController@index');
$app->get('/status/{id}','StatusPlayerController@show');
$app->post('/status','StatusPlayerController@store');
$app->put('/status/{id}','StatusPlayerController@update');
$app->delete('/status/{id}','StatusPlayerController@destroy');


//cek condition in game
$app->post('/cek','AkunController@cek');
$app->get('/','AkunController@listing');
