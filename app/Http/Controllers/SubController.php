<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

class SubController extends WorkbenchController
{
	public function getMenuDataByUrl()
	{
		$url = $_SERVER["REQUEST_URI"];
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
	
		$return = 'workbench.' . $sub . '.' . $parent;
		return view($return,compact('user','menus','menuData'));
	}
}
