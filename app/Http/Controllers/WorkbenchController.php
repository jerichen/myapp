<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Redirect;

use App\Menu;

class WorkbenchController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$user = Auth::loginUsingId($user->id);

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

    	return view('workbench.index',compact('user','menus'));
    }
}
