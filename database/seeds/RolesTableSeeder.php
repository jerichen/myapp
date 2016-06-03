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
            ],
            [
                'id'   => 2,
                'name' => 'admin',
            ],
            [
                'id'   => 3,
                'name' => 'user',
            ],
        ]);
    }
}
