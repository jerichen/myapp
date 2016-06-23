<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('menus')->insert([
    			[
	    			'id'          => 1,
	    			'parent_id'   => 0,
	    			'url'         => '/workbench/dashboard',
	    			'name'        => 'Dashboard',
	    			'description' => null,
	    			'icon'        => 'fa fa-dashboard',
	    			'open'        => null,
	    			'has_sub'     => 0,
	    			'order'       => 0,
	    			'status'      => 1,
    			],
    			[
	                'id'          => 2,
	                'parent_id'   => 0,
	                'url'         => null,
	                'name'        => 'Content',
	                'description' => null,
	                'icon'        => 'fa fa-book',
	                'open'        => null,
	                'has_sub'     => 1,
	                'order'       => 1,
	                'status'      => 1,
	            ],
    			[
	                'id'          => 3,
	                'parent_id'   => 2,
	                'url'         => '/workbench/menu/menu',
	                'name'        => 'Menu',
	                'description' => null,
	                'icon'        => 'fa fa-bars',
	                'open'        => null,
	                'has_sub'     => 0,
	                'order'       => 2,
	                'status'      => 1,
	            ],
    			[
	    			'id'          => 4,
	    			'parent_id'   => 0,
	    			'url'         => null,
	    			'name'        => 'Users',
	    			'description' => null,
	    			'icon'        => 'fa fa-users',
	    			'open'        => null,
	    			'has_sub'     => 1,
	    			'order'       => 3,
	    			'status'      => 1,
    			],
    			[
	    			'id'          => 5,
	    			'parent_id'   => 4,
	    			'url'         => '/workbench/user/user',
	    			'name'        => 'Users',
	    			'description' => null,
	    			'icon'        => 'fa fa-users',
	    			'open'        => null,
	    			'has_sub'     => 0,
	    			'order'       => 4,
	    			'status'      => 1,
    			],
    			[
	    			'id'          => 6,
	    			'parent_id'   => 4,
	    			'url'         => '/workbench/user/role',
	    			'name'        => 'Roles',
	    			'description' => null,
	    			'icon'        => 'fa fa-user-plus',
	    			'open'        => null,
	    			'has_sub'     => 0,
	    			'order'       => 5,
	    			'status'      => 1,
    			],
    			[
	    			'id'          => 7,
	    			'parent_id'   => 4,
	    			'url'         => '/workbench/user/permission',
	    			'name'        => 'Permissions',
	    			'description' => null,
	    			'icon'        => 'fa fa-check-circle-o',
	    			'open'        => null,
	    			'has_sub'     => 0,
	    			'order'       => 6,
	    			'status'      => 1,
    			],
    	]);
    }
}
