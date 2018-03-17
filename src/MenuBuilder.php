<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

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
     * @param array $options
     *
     * @return \Illuminate\View\View|null
     */
    public function render($group, array $options = null)
    {
        return Menu::render($group, $options);
    }
}