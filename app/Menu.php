<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}
}
