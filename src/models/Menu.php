<?php

namespace ToxicLemurs\MenuBuilder\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

/**
 * Class Menu
 *
 * @package App
 */
class Menu extends Model
{
    /**
     * @var string
     */
    protected $table = 'menu';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'group_id',
        'order',
        'parent',
        'title',
        'path',
        'active',
        'class',
        'icon',
        'small_class',
        'small_text'
    ];

    protected static $options = [];

    /**
     * @var array
     */
    private static $tree = [];

    /**
     * Compiles and returns a menu structure based on a template
     *
     * @param string $groupName
     * @param array $options
     *
     * @return View|null
     */
    public static function render($groupName, array $options = null)
    {
        self::$options = $options;

        if (empty($groupName)) {
            return null;
        }

        $group = Group::whereName($groupName)->first();

        if ($group && $group->count()) {
            $menu = Menu::whereGroupId($group->id)
                ->whereActive(1)
                ->orderBy('order')
                ->get()
                ->toArray();

            self::$tree = self::buildMenuTree($menu);
        }

        if (isset($options['templates']) && isset($options['templates']['container'])) {
            return view($options['templates']['container'], ['menuTree' => self::$tree, 'options' => $options]);
        }

        return view('menuBuilder::menu.default', ['menuTree' => self::$tree, 'options' => $options]);
    }

    /**
     * Generate the menu html
     *
     * @param array $menuItems
     * @param bool  $child
     *
     * @return string
     */
    public static function generateMenuHtml($menuItems, $child = false)
    {
        $html = '';

        $template = isset(self::$options['templates']) && isset(self::$options['templates']['builder'])
            ? self::$options['templates']['builder']
            : 'menuBuilder::menu.partials.list';

        foreach ($menuItems as $menuItem) {
            $html .= view($template, ['item' => $menuItem, 'child' => $child]);
        }

        return $html;
    }

    /**
     * Iterate through the menu structure and build the parent child relationships
     *
     * @param array $menuArray
     * @param int   $parent
     *
     * @return array
     */
    private static function buildMenuTree(array $menuArray, $parent = 0)
    {
        $items = [];

        foreach ($menuArray as $menuItem) {
            if ((int)$menuItem['parent'] === (int)$parent) {
                $menuItem['children'] = isset($menuItem['children'])
                    ? $menuItem['children']
                    : self::buildMenuTree($menuArray, $menuItem['id']);

                if (!$menuItem['children']) {
                    unset($menuItem['children']);
                }

                $items[] = $menuItem;
            }
        }

        return $items;
    }

    /**
     * Returns the menu title for a given ID
     *
     * @param $id
     *
     * @return string
     */
    public static function getMenuTitle($id)
    {
        $title = Menu::find($id);

        return $title ? $title->title : null;
    }

    /**
     * Create a new Menu Item
     *
     * @param array $item
     *
     * @return Menu
     */
    public function createMenuItem(array $item)
    {
        return Menu::create($item);
    }

    /**
     * Update an existing menu item
     *
     * @param int   $id
     * @param array $item
     *
     * @return bool|int
     */
    public function updateMenuItem($id, array $item)
    {
        return Menu::find($id)->update($item);
    }

    /**
     * Get the menu tree
     *
     * @return array
     */
    public function getMenuTree()
    {
        return self::$tree;
    }

    /**
     * Removes a menu item from the system
     *
     * @param int $id
     *
     * @return int
     */
    public function deleteMenuItem($id)
    {
        return Menu::destroy($id);
    }

    /**
     * Returns a parent id based on title
     *
     * @param string $title
     *
     * @return int
     */
    public function getParentIdFromTitle($title)
    {
        return $this->whereTitle($title)->firstOrFail()->id;
    }
}
