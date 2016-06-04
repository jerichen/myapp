<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class PermissionController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$user = Auth::loginUsingId($user->id);

		return view('test',compact('user'));
	}
}
