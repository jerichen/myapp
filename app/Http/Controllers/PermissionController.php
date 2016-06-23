<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\User;
use App\Role;
use App\Menu;
use function League\Flysystem\getMetadata;

use Yuansir\Toastr\Facades\Toastr;

class PermissionController extends Controller
{
	protected function getMenus($userID)
	{
	    $userRoles = User::find($userID)->roles;
		$userPermissions = Role::find($userRoles[0]->id)->roles;
		
		$menu = array();
		foreach ($userPermissions as $permission){
		    $menu_permission_rows = unserialize($permission->menu_permission);
		    if(in_array('view', $menu_permission_rows)){
		        $menu = Menu::find($permission->menu_id);
		        
		        // 主層或副層
		        if($menu->parent_id == 0){
		            $menus[$menu->id] = $menu;
		        }else{
		            if (isset($var['test'])) {
		                $menus[$menu->id]['sub'] = $menu;
		            }  
		        }
		    }		    
		}
		
		return $menus;
	}
	
	public function index()
	{
		$user = Auth::loginUsingId(1);
		$menus = $this->getMenus($user->id);
		return view('test',compact('user','menus'));
	}
	
	public function toastrTest()
	{
		$options = array('positionClass' => 'toast-top-left');
		Toastr::error('Hello World!','TITLE',$options);
		return view('home');
	}
}
