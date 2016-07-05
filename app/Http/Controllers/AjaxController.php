<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Menu;

class AjaxController extends Controller
{
	public function index($get = null)
	{
		switch ($get){
			case 'getUser':
				$result = $this->getUser();
			break;
			case 'getRole':
				$result = $this->getRole();
// 				var_dump($result);exit;
			break;
		}

		return $result;
	}
	
	protected function getUser()
	{
		$user_id = $_GET['id'];	
		$user = User::find($user_id);
		$role = User::find($user_id)->roles()->first();

		$result['user'] = $user;
		$result['role'] = $role;
		
		return $result;
	}
	
	protected function getRole()
	{
		$role_id = $_GET['id'];
		$role = Role::find($role_id);
		$permission = Role::find($role_id)->roles;

		$result['role'] = $role;
		$result['permission'] = $permission;
		
		return $result;
	}
}
