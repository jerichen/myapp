<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class DestroyController extends Controller
{
	public function index($sub,$parent,Request $request)
	{
		switch ($parent){
			case 'role';
				$result['roles'] = $this->getRoles();
			break;
			case 'user';
				$result = $this->destroyUser($request->all());
			break;
		}
	
		return json_encode($result);
	}
	
	protected function destroyUser(array $post)
	{
		User::destroy($post['user_id']);
		
		$result['error'] = 0;
		return $result;
	}
}
