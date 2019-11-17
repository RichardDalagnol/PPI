<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function(){
	return  view('login');
});


Route::namespace('Admin')->prefix('admin')->group(function () {
	
	Route::resource('documentos', 'DocumentoController');
	Route::resource('users', 'UsuarioController');
	Route::post('logar', 'UsuarioController@login');
});

Route::post('logar', 'UsuarioController@login');

Route::get('/download/{file}', 'DownloadsController@download');



