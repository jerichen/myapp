<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class PermissionController extends Controller
{
	public function index()
	{
		$user = Auth::loginUsingId(1);
		return view('test',compact('user'));
	}
}
