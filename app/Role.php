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
	
	// 判斷是否存在，沒有就新增，有就修改
	public function updateRoleUser($user_id,$role_id)
	{
		$results = DB::select('select * from role_user where user_id = :user_id', ['user_id' => $user_id]);
		
		if($results){
			$param = array($role_id,$user_id);
			$affected = DB::update('update role_user set role_id = ? where user_id = ?', $param);
		}else{
			$param = array($user_id,$role_id);
			DB::insert('insert into role_user (user_id,role_id) values (?, ?)', $param);
		}
	}
}
