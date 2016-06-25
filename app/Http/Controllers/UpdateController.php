<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Exception;

use App\User;
use App\Role;

class UpdateController extends Controller
{
	public function index($sub,$parent,Request $request)
	{
		switch ($parent){
			case 'role';
				$result['roles'] = $this->getRoles();
			break;
			case 'user';
				if ($request->file('user_pic')->isValid()) {
					$file = $request->file('user_pic');
				}
				
				$result = $this->updateUser($request->all(),$file);
			break;
		}
	
		return json_encode($result);
	}
	
	protected function updateUser(array $post, $file = null)
	{
		try {
			$check = User::where('email',$post['email'])->where('id','!=',$post['user_id'])->first();
			if(is_null($check)){
				$user = User::find($post['user_id']);
				$user->name = $post['name'];
				$user->email = $post['email'];
				if($post['password'] != null){
					$user->password = bcrypt($post['password']);
				}
				
				# user pic
				if($file->isValid()){
					# TODO 要刪除原本的才不會一直長下去
					$targetUrl = 'images/pic/';
					$fileExt = $file->getClientOriginalExtension();
					$fileName = time() . '.' . $fileExt;

					$update = $file->move($targetUrl, $fileName);
					$user->user_pic = '/' . $update->getPathname();
				}
				
				$user->save();
				
				$roleModel = new Role;
				$roleModel->updateRoleUser($post['user_id'],$post['rolesRadios']);
				
				$result['error'] = 0;
				return $result;
			}else{
				$result['error'] = 1;
				$result['message'] = 'Email已存在!';
				return $result;
			}
		} catch (Exception $e) {
			$result['error'] = 1;
			$result['message'] = $e->getMessage();

			return $result;
		}
	}
}
