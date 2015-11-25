<?php

namespace ToxicLemurs\MenuBuilder\models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App
 */
class Group extends Model
{
    /**
     * @var string
     */
    protected $table = 'menu_group';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name'];

    /**
     * Creates a new group based on name
     *
     * @param string $name

     * @return static
     */
    public function addGroup($name)
    {
        return Group::create(['name' => $name]);
    }

    /**
     * Updates an existing group in the system
     *
     * @param $id
     * @param $name
     */
    public function updateGroup($id, $name)
    {
        $group = Group::find($id);
        $group->name = trim($name);
        $group->save();
    }

    /**
     * Returns the human friendly name for a group
     *
     * @param $id
     *
     * @return string
     */
    public static function getGroupName($id)
    {
        $name = Group::find($id);

        return $name ? $name->name : null;
    }

    /**
     * Removes a group from the system
     *
     * @param int $id
     *
     * @return int
     */
    public function deleteGroup($id)
    {
        return Group::destroy($id);
    }

    /**
     * Returns the group id based on group name
     *
     * @param string $name
     *
     * @return int
     */
    public function getGroupIdFromName($name)
    {
        return $this->whereName($name)->firstOrFail()->id;
    }
}
