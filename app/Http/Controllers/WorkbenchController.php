<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Redirect;

class WorkbenchController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('workbench.index',compact('user'));
    }
}
