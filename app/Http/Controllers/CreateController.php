<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;

use Validator;

use Yuansir\Toastr\Facades\Toastr;

use App\User;

class CreateController extends Controller
{
	public function index($sub,$parent,Request $request)
	{
		switch ($parent){
			case 'role';
			$result['roles'] = $this->getRoles();
			break;
			case 'user';
				$result = $this->createUser($request->all());
			break;
		}

		return json_encode($result);
	}
	
	protected function createUser(array $post)
	{
		$create['name'] = $post['name'];
		$create['email'] = $post['email'];
		$create['password'] = bcrypt($post['password']);
		
		$check = User::where('email',$post['email'])->first();
		if(is_null($check)){
			User::create($create);
			$result['error'] = 0;
			return $result;
		}else{
			$result['error'] = 1;
			$result['message'] = '帳號已存在!';
			return $result;
		}
	}
}
