<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
        	$gate->define($permission->menu_id, function($user,$menu_permission) use ($permission) {
        	$menu_permission_rows = unserialize($permission->menu_permission);
	        	if(in_array($menu_permission, $menu_permission_rows)){
	        		return $user->hasPermission($permission);
	        	}
        	});
        }

        /*
        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
        	$gate->define($permission->name, function($user) use ($permission) {
        		return $user->hasPermission($permission);
        	});
        }
        */
    }
}
