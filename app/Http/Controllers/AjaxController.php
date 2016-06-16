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
	}
	
	public function getUser()
	{
		$user_id = $_GET['id'];	
		$user = User::find($user_id);
		$role = User::find($user_id)->roles()->first();

		$result['user'] = $user;
		$result['role'] = $role;
		
		return $result;
	}
}
