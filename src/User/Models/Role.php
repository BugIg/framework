<?php

namespace AvoRed\Framework\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * Admin Role name Constant.
     */
    const ADMIN = 'Administrator';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Create Role Resource into a database.
     * @return Role $role
     */
    public static function findAdminRole(): Role
    {
        return self::whereName(self::ADMIN)->first();
    }

    /**
     * @param $routes
     * @return bool
     */
    public function hasPermission($routes)
    {
        $modelPermissions = $this->permissions->pluck('name');
        $permissions = explode(',', $routes);
        $hasPermission = true;

        foreach ($permissions as $permissions) {
            if (! $modelPermissions->contains($permissions)) {
                $hasPermission = false;
            }
        }

        return $hasPermission;
    }

    /**
     * Role has many Permissions.
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
