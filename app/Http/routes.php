<?php

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/preparaAltera/{id}', 'ProdutoController@preparaAltera');
Route::post('/produtos/altera', 'ProdutoController@altera');
Route::get('/login', 'LoginController@login');

Route::get('home', 'HomeController@index');

Route::controllers([
'auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
