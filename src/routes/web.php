<?php

Route::get('/', 'Geazi\Interbits\App\Http\Controllers\RegisterController@getUsers');

Route::group(['prefix' => '/register', 'middleware' => ['web']], function() {

    Route::get('/', 'Geazi\Interbits\App\Http\Controllers\RegisterController@getUsers');
    Route::get('/search', 'Geazi\Interbits\App\Http\Controllers\RegisterController@getSearch');
    Route::get('/add', 'Geazi\Interbits\App\Http\Controllers\RegisterController@getAdd');
    Route::post('/add', 'Geazi\Interbits\App\Http\Controllers\RegisterController@postAdd');
    Route::get('/edit/{id}', 'Geazi\Interbits\App\Http\Controllers\RegisterController@getEdit');
    Route::get('/delete/{id}', 'Geazi\Interbits\App\Http\Controllers\RegisterController@delete');

});

Route::group(['prefix' => '/functions', 'middleware' => ['web']], function() {

    Route::get('/', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@getFunctions');
    Route::get('/add', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@getAdd');
    Route::post('/add', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@postAdd');
    Route::get('/edit/{id}', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@getEdit');
    Route::post('/edit/{id}', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@postEdit');
    Route::get('/delete/{id}', 'Geazi\Interbits\App\Http\Controllers\FunctionsController@delete');

});