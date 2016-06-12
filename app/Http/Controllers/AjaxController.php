<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{
	public function index($get = null)
	{
		switch ($get){
			case 'getUser';
				$result = $this->getUser();
			break;
		}
		
		return json_encode($result);
	}
	
	public function getUser()
	{
		$user_id = $_GET['id'];
		$data['name'] = 'test';

		return $data;
	}
}
