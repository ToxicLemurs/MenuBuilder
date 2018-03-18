## Simple database driven menu manager for Laravel 5

This package allows you to create tree based menu structures that are database driven (Eloquent) and renders HTML based on fully customizable templates and views. There is no limit the nesting level but the amount of levels will need to be handled in your views / templates. 

## Installation:

Require this package in your composer.json and update composer. This will download the package and all the dependencies:

    "toxic-lemurs/menu-builder": "1.*"
    
Alternatively you can require this through composer via the command line:

    $ composer require toxic-lemurs/menu-builder
    
### Laravel 5.5 onward:

The Menu-Builder package now supports Package Auto Discovery.

### Prior to Laravel 5.5:

Run a composer update and add the following Service Provider in your config/app.php

    ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider::class,

Optionally you can make use of the Facade:

    'MenuBuilder' => ToxicLemurs\MenuBuilder\Facades\MenuBuilder::class,
    
Publish the Menu Builder migrations:

    $ php artisan vendor:publish --provider="ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider" --tag=migrations
    $ php artisan migrate
    
You can optionally publish the views so you can easily override them with your site's styling and layout:

    $ php artisan vendor:publish --provider="ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider" --tag=views
    
Publish the config to tie and modify the default administration routes to your project:

    $ php artisan vendor:publish --provider="ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider" --tag=config

## Getting started:

In your views / templates you can use the Facade to render your menu:

    {!! MenuBuilder::render('Group Name') !!}
    
Alternatively if you do not want to use the Facade:

    {!! ToxicLemurs\MenuBuilder\Facades\MenuBuilder::render('Group Name') !!}

Default routes have been setup for managing the menu:

    /menu - Manages your actual menu items that gets attached to menu groups
    /group - Setup menu groups to easily group your different menus
    
You can override the default routes with your own custom routes (The package routes are currently defined individually and not as resources to allow for override flexibility):

    Route::get('my/route/menu', ['uses' => '\ToxicLemurs\MenuBuilder\Http\Controllers\MenuController@index', 'as' => 'menu.index'])

## Overriding the views:

You can override the default implementation of how the menu gets rendered by modifying your published views:

    views/menu/default.blade.php - This is the master template for binding the menu partials
    views/menu/partials/list.blade.php - This is the partial that creates the list items / html for the menu
    
Alternatively you can specify custom templates to use for your base templates on a per menu level:

    {!! MenuBuilder::render('Group Name', $options = [
        'templates' => [
            // The container file overrides the views/menu/default.blade.php template
            'container' => 'foo.bar', // resources/views/foo/bar.blade.php
            
            // The builder file overrides the views/menu/partials/list.blade.php
            'builder' => 'bar.foo', // resource/views/bar/foo.blade.php
        ]
    ]) !!}
    
You can look inside the example folder for an implementation of the Menu Builder by copying the vendor folder into your resources folder. Make sure your database contains menu items. Example source can be [found here](http://bootsnipp.com/snippets/featured/responsive-navigation-menu).
    
### License:

This Menu Builder for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
