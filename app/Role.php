<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function roles()
	{
		return $this->belongsToMany(Permission::class);
	}
	
	// 角色增加權限
	public function givePermissionTo($permission)
	{
		return $this->permissions()->save($permission);
	}
}
