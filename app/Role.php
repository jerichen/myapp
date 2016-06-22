<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
	
	// 新增role user
	public function insertRoleUser($user_id,$role_id)
	{
	    $param = array($user_id,$role_id);
	    DB::insert('insert into role_user (user_id,role_id) values (?, ?)', $param);
	}
}
