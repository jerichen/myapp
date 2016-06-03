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
    				'name' => 'user.user.view',
    				'label' => 'View user',
    			],
    			[
	    			'name' => 'user.user.create',
	    			'label' => 'Create user',
    			],
    			[
	    			'name' => 'user.user.edit',
	    			'label' => 'Update user',
    			],
    			[
    				'name' => 'user.user.delete',
    				'label' => 'Delete user',
    			],
    	]);
    }
}
