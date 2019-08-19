<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['user'=>'API\UserController']);
Route::get('perfil','API\UserController@perfil');
Route::put('perfil','API\UserController@updatePerfil');
Route::get('findUser','API\UserController@search');

Route::apiResources(['escritorio'=>'API\EscritorioController']);
Route::get('findTag','API\EtiquetaController@search');

Route::apiResources(['mensaje'=>'Web\ContactoController']);
Route::get('findMsg','Web\ContactoController@search');

Route::apiResources(['entrada'=>'API\EntradaController']);
Route::get('misEntradas','API\EntradaController@misEntradas');
Route::get('findPosts','API\EntradaController@search');

Route::apiResources(['etiqueta'=>'API\EtiquetaController']);
Route::get('findTag','API\EtiquetaController@search');

Route::apiResources(['categoria'=>'API\CategoriaController']);
Route::get('findCategory','API\CategoriaController@search');
