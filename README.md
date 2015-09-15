## Menu Builder for Laravel 5

Require this package in your composer.json and update composer. This will download the package and all the dependencies.

    "toxiclemurs/menu-builder": "1.*"

## Installation

### Laravel 5.x:

Add the Service Provider in your config/app.php after you have done the composer update:

    ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider::class,

You can make use of the Facade to shorten your code:

    'MenuBuilder' => ToxicLemurs\MenuBuilder\Facades\MenuBuilder::class,
    
Publish the Menu Builder migrations:

    $ php artisan vendor:publish --provider="ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider" --tag=migrations
    $ php artisan migrate
    
You can optionally publish the views so you can easily override them with your site's styling and layout:

    $ php artisan vendor:publish --provider="ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider" --tag=views

## Using

In any view / template you can use the Facade to render your menu:

    {!! MenuBuilder::render('Group Name') !!}

Default routes have been setup for managing the menu:

    /menu - Manages your actual menu items that gets attached to menu groups
    /group - Setup menu groups to easily group your different menus
    
## Overriding the views

You can override the default implementation of how the menu gets rendered by modifying your published views:

    views/menu/default.blade.php - The master template for binding the menu partials
    views/menu/partials/list.blade.php - The partial that creates the list items for the menu
    
### License

This Menu Builder for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)