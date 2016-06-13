<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class AjaxController extends Controller
{
	public function index($get = null)
	{
		switch ($get){
			case 'getUser';
				$result = $this->getUser();
			break;
		}
		
		return $result;
		return json_encode($result);
	}
	
	public function getUser()
	{
		$user_id = $_GET['id'];	
		$user = User::find($user_id);
		$role = User::find($user_id)->roles()->first();

		$roles = Role::all();
		foreach ($roles as $key => $row){
		    $has_role = ($row->id == $role->id) ? 1 : 0;
		    $roles[$key]['has_role'] = $has_role;
		}
		
		$result['user'] = $user;
		$result['roles'] = $roles;
		
		return $result;
	}
}
