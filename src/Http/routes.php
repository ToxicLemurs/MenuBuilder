<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

Route::middleware(['web', 'auth'])->group(function () {
    // Menu Routes
    Route::get(
        Config::get('menuBuilder.config.routes.menu'),
        ['uses' => 'MenuController@index', 'as' => 'menu.index']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.menu') . '/create',
        ['uses' => 'MenuController@create', 'as' => 'menu.create']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.menu') . '/{id}/edit',
        ['uses' => 'MenuController@edit', 'as' => 'menu.edit']
    );
    Route::post(
        Config::get('menuBuilder.config.routes.menu') . '/{id}/edit',
        ['uses' => 'MenuController@update', 'as' => 'menu.update']
    );
    Route::post(
        Config::get('menuBuilder.config.routes.menu') . '/create',
        ['uses' => 'MenuController@store', 'as' => 'menu.store']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.menu') . '/{id}/destroy',
        ['uses' => 'MenuController@destroy', 'as' => 'menu.destroy']
    );

    // Menu Group Routes
    Route::get(
        Config::get('menuBuilder.config.routes.group'),
        ['uses' => 'GroupController@index', 'as' => 'group.index']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.group') . '/create',
        ['uses' => 'GroupController@create', 'as' => 'group.create']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.group') . '/{id}/edit',
        ['uses' => 'GroupController@edit', 'as' => 'group.edit']
    );
    Route::post(
        Config::get('menuBuilder.config.routes.group') . '/{id}/edit',
        ['uses' => 'GroupController@update', 'as' => 'group.update']
    );
    Route::post(
        Config::get('menuBuilder.config.routes.group') . '/create',
        ['uses' => 'GroupController@store', 'as' => 'group.store']
    );
    Route::get(
        Config::get('menuBuilder.config.routes.group') . '/{id}/destroy',
        ['uses' => 'GroupController@destroy', 'as' => 'group.destroy']
    );
});
