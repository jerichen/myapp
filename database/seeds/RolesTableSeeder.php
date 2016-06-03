<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert([
            [
                'id'   => 1,
                'name' => 'superuser',
            	'lable' => 'The admin of the site',
            ],
            [
                'id'   => 2,
                'name' => 'admin',
            	'lable' => 'The admin of the site',
            ],
            [
                'id'   => 3,
                'name' => 'user',
            	'label' => 'The user of the site',
            ],
        ]);
    }
}
