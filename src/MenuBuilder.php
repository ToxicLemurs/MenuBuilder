<?php

namespace ToxicLemurs\MenuBuilder;

use ToxicLemurs\MenuBuilder\models\Menu;

/**
 * Class MenuBuilder
 *
 * @package packages\ToxicLemurs\MenuBuilder\src
 */
class MenuBuilder
{
    /**
     * Renders a menu based on group
     *
     * @param string $group
     *
     * @return \Illuminate\View\View|null
     */
    public function render($group)
    {
        return Menu::render($group);
    }
}