<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use Redirect;

class ActionController extends Controller
{
	public function index($sub,$parent,Request $request)
	{
		switch ($parent){
			case 'role';
				$result['roles'] = $this->getRoles();
			break;
			case 'user';
				$post = $request->all();
				var_dump($post);exit;

				$validator = Validator::make($post, [
						'name' => 'required|max:255',
						'email' => 'required|email|max:255|unique:users',
						'password' => 'required|min:6|confirmed',
				]);
				
				if ($validator->fails()) {
					return Redirect::back()->withErrors(['fail'=>'帳號已存在!']);
				}else{
					return User::create($post);
				}
				
// 				$this->createUser($post);
			break;
		}
	}
	
	protected function createUser(array $post)
	{
		$create['name'] = $post['name'];
		$create['email'] = $post['email'];
		$create['password'] = $post['password'];

		$validator = Validator::make($create, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
		
		if ($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{
			return User::create($data);
		}
	}
}
