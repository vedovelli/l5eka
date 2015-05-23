<?php



Route::get('categorias', ['middleware' => 'auth', 'uses' => 'CategoryController@index']);



















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