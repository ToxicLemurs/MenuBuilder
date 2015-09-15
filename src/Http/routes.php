<?php

// Menu Routes
Route::get('/menu', ['uses' => 'MenuController@index', 'as' => 'menu.index']);
Route::get('/menu/create', ['uses' => 'MenuController@create', 'as' => 'menu.create']);
Route::get('/menu/{id}/edit', ['uses' => 'MenuController@edit', 'as' => 'menu.edit']);
Route::post('/menu/{id}/edit', ['uses' => 'MenuController@update', 'as' => 'menu.update']);
Route::post('/menu/create', ['uses' => 'MenuController@store', 'as' => 'menu.store']);
Route::get('/menu/{id}/destroy', ['uses' => 'MenuController@destroy', 'as' => 'menu.destroy']);

// Menu Group Routes
Route::get('/group', ['uses' => 'GroupController@index', 'as' => 'group.index']);
Route::get('/group/create', ['uses' => 'GroupController@create', 'as' => 'group.create']);
Route::get('/group/{id}/edit', ['uses' => 'GroupController@edit', 'as' => 'group.edit']);
Route::post('/group/{id}/edit', ['uses' => 'GroupController@update', 'as' => 'group.update']);
Route::post('/group/create', ['uses' => 'GroupController@store', 'as' => 'group.store']);
Route::get('/group/{id}/destroy', ['uses' => 'GroupController@destroy', 'as' => 'group.destroy']);