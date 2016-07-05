<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;

use App\Menu;

use App\Role;

use App\User;

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
    	$active_id = $menuData->id;

    	$return = 'workbench.' . $sub;
    	return view($return,compact('user','menus','menuData','active_id'));
	}
	
	# 第二層
	public function parent($sub,$parent = null)
	{
		$user = $this->user;
		$menus = $this->menus;
		$menuData = $this->getMenuDataByUrl();
		$active_id = $menuData->parent_id;

		$result['user'] = $user;
		$result['menus'] = $menus;
		$result['menuData'] = $menuData;
		$result['active_id'] = $active_id;

		switch ($parent){
			case 'role';
				$result['roles'] = $this->getRoles();
				$result['modules'] = $this->getModules();
			break;
			case 'user';
				$roles = Role::all();
				$result['usersData'] = $this->getUsers();
				$result['roles'] = $roles;
			break;
		}

		# TODO
// 		var_dump($res['roles']->previousPageUrl());exit;
// 		return $res['roles']->currentPage();

		$return = 'workbench.' . $sub . '.' . $parent;
		return view($return,$result);
	}
	
	protected function getRoles()
	{
		$roles = Role::paginate(10);
		return $roles;
	}
	
	protected function getModules()
	{
		$menuModel = new Menu;
		$menus = $menuModel->getModules();
		return $menus;
	}
	
	protected function getUsers()
	{
		$userDao = new User();
		$users = $userDao->getUsers();
		return $users;
	}
}
