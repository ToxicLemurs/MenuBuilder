<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

namespace ToxicLemurs\MenuBuilder\Http\Controllers;

use Illuminate\Support\Facades\Input;
use ToxicLemurs\MenuBuilder\models\Group as Group;
use ToxicLemurs\MenuBuilder\Http\Requests\GroupPostRequest;
use ToxicLemurs\MenuBuilder\Http\Requests\GroupPostEditRequest;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

/**
 * Class GroupController
 *
 * @package App\Http\Controllers
 */
class GroupController extends Controller
{
    /**
     * Return a list of the current groups in the system
     *
     * @return View
     */
    public function index()
    {
        return view('menuBuilder::group.index', ['groups' => Group::all()]);
    }

    /**
     * Add a new group to the system
     *
     * @return View
     */
    public function create()
    {
        return view('menuBuilder::group.create');
    }

    /**
     * Stores the newly created data for a group
     *
     * @param GroupPostRequest $request
     *
     * @return Redirector
     */
    public function store(GroupPostRequest $request)
    {
        (new Group())->addGroup(Input::get('name'));

        return redirect(route('group.index'));
    }

    /**
     * Modifies and existing group
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id)
    {
        return view('menuBuilder::group.create', ['group' => Group::find($id)]);
    }

    /**
     * Store method for the updating of groups
     *
     * @param GroupPostEditRequest $request
     * @param int $id
     *
     * @return Redirector
     */
    public function update(GroupPostEditRequest $request, $id)
    {
        (new Group())->updateGroup($id, Input::get('name'));

        return redirect(route('group.index'));
    }

    /**
     * Removes a group from the system
     *
     * @param int $id
     *
     * @return Redirector
     */
    public function destroy($id)
    {
        (new Group())->deleteGroup($id);

        return redirect(route('group.index'));
    }
}
