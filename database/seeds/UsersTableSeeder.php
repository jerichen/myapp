<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$post['name'] = 'jeri';
    	$post['email'] = 'jeri.chen0110@gmail.com';
    	$post['password'] = Hash::make('08050805');
    	 
    	User::create($post);
    }
}
