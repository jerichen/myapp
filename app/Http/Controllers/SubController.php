<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SubController extends WorkbenchController
{
	public function page($sub = null)
	{
		$user = $this->user;
    	$menus = $this->menus;
    	
    	$return = 'workbench.' . $sub;

    	return view($return,compact('user','menus','sub'));
	}
}
