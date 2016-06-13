<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

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
    
    public function getUsers()
    {
    	$res = DB::table('users AS u')
    				->select('u.*','r.name AS role_name')
			    	->leftJoin('role_user AS ru', 'u.id', '=', 'ru.user_id')
			    	->leftJoin('roles AS r', 'r.id', '=', 'ru.role_id')
			    	->orderBy('u.id', 'ASC')
			    	->paginate(50);
    	
		return $res;
    }
}
