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
    	 
    	User::create($post);
    	
    	$post['name'] = 'JeriLaravel';
    	$post['email'] = 'jeri.chen0805@yahoo.com.tw';
    	$post['password'] = Hash::make('08050805');
    	
    	User::create($post);
    	
    	$post['name'] = 'JeriGmail';
    	$post['email'] = 'jeri.chen0805@gmail.com';
    	$post['password'] = Hash::make('08050805');
    	
    	User::create($post);
    }
}
