<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Menu;
use function League\Flysystem\getMetadata;

use Yuansir\Toastr\Facades\Toastr;

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
	
	public function toastrTest()
	{
		$options = array('positionClass' => 'toast-top-left');
		Toastr::error('Hello World!','TITLE',$options);
		return view('home');
	}
}
