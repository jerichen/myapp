<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Permission;
use App\Menu;
use App\User;
use App\Role;

class checkMenuPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        # 判斷是否有權限
        $url = strtok($_SERVER['REQUEST_URI'],'?');
        $user = $request->user();
        $menu = Menu::where('url', $url)->first();
        $permission = Permission::where('menu_id',$menu->id)->first();
       
        $hasPermission = User::find($user->id)->hasPermission($permission);
        if($hasPermission){
            $menu_permission_rows = unserialize($permission->menu_permission);
            $method = $this->getMethodStr($request->method());
            
            if(in_array($method, $menu_permission_rows)){
                return $next($request);
            }
        }

        return redirect()->guest('workbench');
    }
    
    protected function getMethodStr($method)
    {
        switch ($method){
            case 'GET':
                $str = 'view';
            break;
            default:
                $str = 'view';
        }
        
        return $str;
    }
}
