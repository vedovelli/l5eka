<?php

Route::group(['prefix' => 'categorias', 'middleware' => 'auth'], function()
{
    Route::get('',                  ['as' => 'category.index',      'uses' => 'CategoryController@index']);
    Route::post('salvar',           ['as' => 'category.store',      'uses' => 'CategoryController@store']);
    Route::get('{id}/editar',       ['as' => 'category.edit',       'uses' => 'CategoryController@edit']);
    Route::post('{id}/atualizar',   ['as' => 'category.update',     'uses' => 'CategoryController@update']);
    Route::get('{id}/remover',      ['as' => 'category.destroy',    'uses' => 'CategoryController@destroy']);
});




















Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

/**
* Controllers
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
* Resources
*/
// GET /user // index()
// GET /user/111 // show($id)
// DELETE /user/111 // destroy($id)
// Route::resource(['user' => 'UserController']);