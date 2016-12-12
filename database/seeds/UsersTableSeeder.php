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
    	$post['name'] = 'JeriChen';
    	$post['email'] = 'jeri.chen0110@gmail.com';
    	$post['password'] = Hash::make('08050805');
    	$post['user_pic'] = 'images/pic/user1-128x128.jpg';
    	 
    	User::create($post);
    	
    	for ($i = 1; $i <= 3; $i ++) {
    	    factory(App\User::class)->create();
    	}
    }
}
