<?php

namespace AvoRed\Framework\User\Models;

use AvoRed\Framework\System\Models\Media;
use AvoRed\Framework\User\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    public function __construct(array $attributes = [])
    {
        $tablePrefix  = config('avored.table_prefix');

        $tableName = $tablePrefix . $this->getTable();
        $this->table = $tableName;
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'image_path', 'role_id', 'is_super_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the full name for the Admin User.
     * @return string $fullName
     */
    public function getFullNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * To check if user has permission to access the given route name.
     * @param $routeName
     * @return bool
     */
    public function hasPermission($routeName)
    {
        if ($this->is_super_admin) {
            return true;
        }
        $role = $this->role;
        if ($role->permissions->pluck('name')->contains($routeName) == false) {
            return false;
        }

        return true;
    }

    /**
     * Get the user's image.
     */
    public function media()
    {
        return $this->morphOne('AvoRed\Framework\System\Models\Media', 'owner');
    }

}
