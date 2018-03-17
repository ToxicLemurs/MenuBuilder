<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */
namespace ToxicLemurs\MenuBuilder\Facades;

/**
 * Class MenuBuilder
 * @package ToxicLemurs\MenuBuilder\Facades
 */
class MenuBuilder
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'menuBuilder';
    }

    /**
     * Resolve a new instance
     */
    public static function __callStatic($method, $args)
    {
        $instance = \app()->make(static::getFacadeAccessor());

        switch (count($args))
        {
            case 0:
                return $instance->$method();
            case 1:
                return $instance->$method($args[0]);
            case 2:
                return $instance->$method($args[0], $args[1]);
            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);
            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);
            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }

}
