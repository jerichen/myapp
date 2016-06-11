<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('permissions')->insert([
    			[
	    			'name' => 'dashboard',
	    			'label' => 'Dashboard',
	    			'menu_id' => 1,
	    			'menu_permission' => 'a:4:{i:0;s:4:"view";i:1;s:6:"create";i:2;s:6:"update";i:3;s:6:"delete";}'
    			],
    			[
	    			'name' => 'user.user',
	    			'label' => 'Users',
	    			'menu_id' => 4,
	    			'menu_permission' => 'a:4:{i:0;s:4:"view";i:1;s:6:"create";i:2;s:6:"update";i:3;s:6:"delete";}'
    			],
    			[
	    			'name' => 'user.user',
	    			'label' => 'Users',
	    			'menu_id' => 5,
	    			'menu_permission' => 'a:4:{i:0;s:4:"view";i:1;s:6:"create";i:2;s:6:"update";i:3;s:6:"delete";}'
    			],
    			[
    				'name' => 'user.role',
    				'label' => 'Roles',
    				'menu_id' => 6,
    				'menu_permission' => 'a:4:{i:0;s:4:"view";i:1;s:6:"create";i:2;s:6:"update";i:3;s:6:"delete";}'
    			],
    			[
    				'name' => 'user.permission',
    				'label' => 'Permissions',
    				'menu_id' => 7,
    				'menu_permission' => 'a:4:{i:0;s:4:"view";i:1;s:6:"create";i:2;s:6:"update";i:3;s:6:"delete";}'
    			],
    	]);
    }
}
