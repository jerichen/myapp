<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Redirect;

use App\Menu;

use App\Permission;

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
	}
	
    public function index()
    {
    	$user = $this->user;
    	$menus = $this->menus;

    	return view('workbench.index',compact('user','menus'));
    }
}
