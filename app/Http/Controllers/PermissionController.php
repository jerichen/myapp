<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Menu;
use function League\Flysystem\getMetadata;

class PermissionController extends Controller
{
	public function getMenus()
	{
		# menus
		$menus = Menu::where('parent_id', 0)->get();
		return $menus;
	}
	
	public function index()
	{
		$user = Auth::loginUsingId(1);
		$menus = $this->getMenus();

		return view('test',compact('user','menus'));
	}
}
