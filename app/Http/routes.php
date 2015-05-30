<?php

Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'categorias'], function()
    {
        Route::get('',                  ['as' => 'category.index',      'uses' => 'CategoryController@index']);
        Route::post('salvar',           ['as' => 'category.store',      'uses' => 'CategoryController@store']);
        Route::get('{id}/editar',       ['as' => 'category.edit',       'uses' => 'CategoryController@edit']);
        Route::post('{id}/atualizar',   ['as' => 'category.update',     'uses' => 'CategoryController@update']);
        Route::get('{id}/remover',      ['as' => 'category.destroy',    'uses' => 'CategoryController@destroy']);
    });

    Route::group(['prefix' => 'projetos'], function()
    {
        Route::get('',                  ['as' => 'project.index',      'uses' => 'ProjectController@index']);
        Route::post('salvar',           ['as' => 'project.store',      'uses' => 'ProjectController@store']);
        Route::get('{id}/editar',       ['as' => 'project.edit',       'uses' => 'ProjectController@edit']);
        Route::post('{id}/atualizar',   ['as' => 'project.update',     'uses' => 'ProjectController@update']);
        Route::get('{id}/remover',      ['as' => 'project.destroy',    'uses' => 'ProjectController@destroy']);
    });
});




/**
* Controller
* Views
* Request
* Repositorio
* Tabelas DB
* Model
*/
















Route::get('/', function()
{
    return redirect()->route('dashboard.index');
});

Route::get('home', function()
{
    return redirect()->route('dashboard.index');
});

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