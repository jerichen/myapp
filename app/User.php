<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }
    
    // 判斷使用者是否具有角色
    public function hasRole($role)
    {
    	if (is_string($role)) {
    		return $this->roles->contains('name', $role);
    	}
    
    	return !! $role->intersect($this->roles)->count();
    }
    
    // 判斷使用者是否具有權限
    public function hasPermission($permission)
    {
    	return $this->hasRole($permission->roles);
    }
    
    // 使用者分配角色
    public function assignRole($role)
    {
    	return $this->roles()->save(Role::whereName($role)->firstOrFail());
    }
}
