<?php

Route::get('ajax', function()
{
    return view('ajax');
});

Route::group(['prefix' => 'api'], function()
{
    Route::get('projects', ['uses' => 'ApiController@projects']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'conta'], function()
    {
        Route::get('',                  ['as' => 'account.index',      'uses' => 'AccountController@index']);
        Route::get('senha',             ['as' => 'account.password',   'uses' => 'AccountController@password']);
    });

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
        Route::get('criar',             ['as' => 'project.create',     'uses' => 'ProjectController@create']);
        Route::get('{id}/editar',       ['as' => 'project.edit',       'uses' => 'ProjectController@edit']);
        Route::get('{id}/mostrar',      ['as' => 'project.show',       'uses' => 'ProjectController@show']);
        Route::post('{id}/atualizar',   ['as' => 'project.update',     'uses' => 'ProjectController@update']);
        Route::get('{id}/remover',      ['as' => 'project.destroy',    'uses' => 'ProjectController@destroy']);
        Route::get('{id}',              ['as' => 'project.details',    'uses' => 'ProjectController@details']);
    });

    Route::group(['prefix' => 'usuarios'], function()
    {
        Route::get('{id}/detalhes/project/{project_id}',     ['as' => 'user.details',        'uses' => 'UserController@details']);
    });

    Route::group(['prefix' => 'secoes'], function()
    {
        Route::get('{id}/remover',          ['as' => 'section.destroy',    'uses' => 'SectionController@destroy']);
        Route::post('{project_id}/criar',   ['as' => 'section.store', 'uses' => 'SectionController@store']);
    });

    Route::group(['prefix' => 'projeto'], function()
    {
        Route::get('{project_id}/secao/{section_id}/criar',       ['as' => 'page.create', 'uses' => 'PageController@create']);
        Route::post('{project_id}/secao/{section_id}/salvar',     ['as' => 'page.store', 'uses' => 'PageController@store']);
        Route::get('{project_id}/pagina/{id}/detalhes',           ['as' => 'page.details', 'uses' => 'PageController@details']);
    });

});




/**
* Controller
* Views
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