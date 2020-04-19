<?php

namespace AvoRed\Framework\Permission;

use Illuminate\Support\Collection;

class Manager
{
    /**
     * Collect all the Permissions from all the modules.
     * @var Collection
     */
    protected $permissions;

    public function __construct()
    {
        $this->permissions = Collection::make([]);
    }

    /**
     * Get all  Permission Collection.
     * @return Collection
     */
    public function all()
    {
        return $this->permissions;
    }

    /**
     * Add Permission into Collection.
     * @param string $key
     * @param callable $callable
     * @return Manager
     */
    public function add($key, $callable = null)
    {
        if (null !== $callable) {
            $group = new PermissionGroup($callable);
            $group->key($key);

            $this->permissions->put($key, $group);
        } else {
            $group = new PermissionGroup();

            $group->key($key);
            $this->permissions->put($key, $group);
        }

        return $group;
    }

    /**
     * Get Permission Collection if exists or Return Empty Collection.
     * @param $key
     * @return Collection
     */
    public function get($key)
    {
        if ($this->permissions->has($key)) {
            return $this->permissions->get($key);
        }

        return Collection::make([]);
    }

    /**
     * Get Permission Collection if exists or Return Empty Collection.
     * @param $key
     * @param $permissionCollection
     * @return Manager
     */
    public function set($key, $permissionCollection)
    {
        $this->permissions->put($key, $permissionCollection);

        return $this;
    }
}
