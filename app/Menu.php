<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}
	
	/*
	 * 取得所有權限設置menus
	 */
	public function getModules()
	{
		$res = DB::table('menus')
					->select('name')
					->where(('parent_id' == 0 && 'has_sub' == 0 ) || ('parent_id' != 0 && 'has_sub' == 0));
		return $res;
	}
}
