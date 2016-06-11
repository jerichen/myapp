<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

use App\Role;

use Redirect;

class SubController extends WorkbenchController
{
	public function getMenuDataByUrl()
	{
		$url = strtok($_SERVER['REQUEST_URI'],'?');
		$menu = Menu::where('url', $url)->first();

		return $menu;
	}
	
	# 只有一層
	public function sub($sub = null)
	{
		$user = $this->user;
    	$menus = $this->menus;
    	$menuData = $this->getMenuDataByUrl();
    	
    	# 判斷是否可view
    	if($this->user->cannot($menuData->id,'view')) {
    		return redirect('workbench');
    	}
 
    	$return = 'workbench.' . $sub;
    	return view($return,compact('user','menus','menuData'));
	}
	
	# 第二層
	public function parent($sub,$parent = null)
	{
		$user = $this->user;
		$menus = $this->menus;
		$menuData = $this->getMenuDataByUrl();
		
		# 判斷是否可view
		if($this->user->cannot($menuData->id,'view')) {
			return redirect('workbench');
		}

		$result['user'] = $user;
		$result['menus'] = $menus;
		$result['menuData'] = $menuData;

		switch ($parent){
			case 'role';
				$result['roles'] = $this->role();
			break;
		}

		# TODO
// 		var_dump($res['roles']->previousPageUrl());exit;
// 		return $res['roles']->currentPage();

		$return = 'workbench.' . $sub . '.' . $parent;
		return view($return,$result);
	}
	
	public function role()
	{
		$roles = Role::paginate(50);
		return $roles;
	}
}
