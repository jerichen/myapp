<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Redirect;

use App\User;
use App\Menu;
use App\Permission;
use App\Role;

class WorkbenchController extends Controller
{
	protected $user;
	protected $menus;
	
	public function __construct()
	{
		# user
		empty($this->user) ? $this->user = $this->getuser() : $this->user = $this->user;
		
		# menus
		empty($this->menus) ? $this->menus = $this->getMenus() : $this->menus = $this->menus;
	}
	
	public function getuser()
	{
		$user = Auth::user();
		$user = Auth::loginUsingId($user->id);
		
		return $user;
	}
	
	public function getMenus()
	{
	    /*
		# menus
		$menus = Menu::where('parent_id', 0)->get();
		 
		foreach ($menus as $key => $menu){
			if($menu['has_sub'] == 1){
				$sub = Menu::where('parent_id', $menu['id'])->get();
			}else{
				$sub = array();
			}
		
			$menus[$key]['sub'] = $sub;
		}
		
		return $menus;
		*/

	    $user = Auth::user();
		$userRoles = User::find($user->id)->roles;
		$userPermissions = Role::find($userRoles[0]->id)->roles;
		
		$menu = array();
		$sub = array();
		foreach ($userPermissions as $permission){
		    $menu_permission_rows = unserialize($permission->menu_permission);
		    if(in_array('view', $menu_permission_rows)){
		        $menu = Menu::find($permission->menu_id);
		
		        // 主層或副層
		        if($menu->parent_id == 0){
		            $menus[$menu->id] = $menu;
		        }else{
		            if (isset($menus[$menu->parent_id])) {
		                $sub[] = $menu;
		                $menus[$menu->parent_id]['sub'] = $sub;		                
		            }
		        }
		    }
		}

		return $menus;
	}
	
    public function index()
    {
    	$user = $this->user;
    	$menus = $this->menus;

    	return view('workbench.index',compact('user','menus'));
    }
    
    public function documentation()
    {
    	$user = $this->user;
    	$menus = $this->menus;
    	return view('workbench.documentation',compact('user','menus'));
    }
}
