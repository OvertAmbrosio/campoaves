<?php
Auth::routes();

Route::get('/', 'Web\PageController@inicio');


Route::get('nosotros', 'Web\PageController@nosotros')->name('nosotros');
Route::get('productos/{linea?}/{producto?}', 'Web\PageController@productos')->name('productos');
Route::get('servicios', 'Web\PageController@servicios')->name('servicios');
Route::get('contacto', 'Web\PageController@contacto')->name('contacto');
Route::post('contacto','Web\ContactoController@store')->name('contacto.store');


//admin
Route::get('/ca-admin', 'CaAdminController@index')->name('ca-admin');
Route::get('/ca-admin/{path}', 'CaAdminController@index')->where('path','([A-z\d-\/_.]+)?');

//blog
Route::get('blog', 'Web\PageController@blog')->name('blog');
Route::get('blog/entrada/{slug}', 'Web\PageController@entrada') -> name('entrada');
Route::get('blog/categoria/{slug}', 'Web\PageController@categoria') -> name('categoria');
Route::get('blog/etiqueta/{slug}', 'Web\PageController@etiqueta') -> name('etiqueta');


