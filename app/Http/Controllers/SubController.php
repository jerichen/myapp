<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

use App\Role;

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
    	
    	$return = 'workbench.' . $sub;
    	return view($return,compact('user','menus','menuData'));
	}
	
	# 第二層
	public function parent($sub,$parent = null)
	{
		$user = $this->user;
		$menus = $this->menus;
		$menuData = $this->getMenuDataByUrl();
		
		$result['user'] = $user;
		$result['menus'] = $menus;
		$result['menuData'] = $menuData;
		
		switch ($parent){
			case 'role';
				$res = $this->role($result);
			break;
		}

		# TODO
// 		return $res['menuData'];
		
		$return = 'workbench.' . $sub . '.' . $parent;
		return view($return,$res);
	}
	
	public function role($result)
	{
		$roles = Role::paginate(1);
		$result['roles'] = $roles;
		
		return $result;
	}
}
