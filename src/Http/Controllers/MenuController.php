<?php

namespace ToxicLemurs\MenuBuilder\Http\Controllers;

use ToxicLemurs\MenuBuilder\models\Group as Group;
use ToxicLemurs\MenuBuilder\models\Menu as Menu;
use ToxicLemurs\MenuBuilder\Http\Requests\MenuItemRequest;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    /**
     * Return a list of the current menu items in the system
     *
     * @return View
     */
    public function index()
    {
        return view('menuBuilder::menu.index', ['items' => Menu::all()]);
    }

    /**
     * Create a new menu item
     *
     * @return View
     */
    public function create()
    {
        return view('menuBuilder::menu.create', ['groups' => Group::all(), 'items' => Menu::all()]);
    }

    /**
     * Create a new menu item in the system
     *
     * @param MenuItemRequest $request
     *
     * @return Redirector
     */
    public function store(MenuItemRequest $request)
    {
        (new Menu())->createMenuItem(\Input::all());

        return redirect(route('menu.index'));
    }

    /**
     * Edit an existing menu item
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id)
    {
        return view('menuBuilder::menu.create', ['item' => Menu::find($id), 'groups' => Group::all(), 'items' => Menu::all()]);
    }

    /**
     * Update and existing menu item
     *
     * @param MenuItemRequest $request
     * @param int             $id
     *
     * @return Redirector
     */
    public function update(MenuItemRequest $request, $id)
    {
        (new Menu())->updateMenuItem($id, \Input::all());

        return redirect(route('menu.index'));
    }

    /**
     * Removes a menu item from the system
     *
     * @param int $id
     *
     * @return Redirector
     */
    public function destroy($id)
    {
        (new Menu())->deleteMenuItem($id);

        return redirect(route('menu.index'));
    }
}
