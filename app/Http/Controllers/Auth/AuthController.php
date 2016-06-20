<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Lang;

use Laravel\Socialite\Facades\Socialite;
use Yuansir\Toastr\Facades\Toastr;

use Auth;
use Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/workbench';
    
    protected $loginPath = '/login';
    
//     protected $redirectAfterLogout = '/auth/login'

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function logout()
    {
    	Auth::logout();
    	return Redirect::to('login');
    }
    
    protected function getFailedLoginMessage()
    {
        $message =  Lang::has('auth.failed')
            ? Lang::get('auth.failed')
            : 'These credentials do not match our records.';
        
        Toastr::error($message,'Alert');
        return $message;
    }
    
    public function getSocialAuth($provider = null)
    {
    	return Socialite::with($provider)->redirect();	
    }
    
    public function getSocialAuthCallback($provider = null)
    {
    	try {  	
    		$user = Socialite::with($provider)->user();
    		
    		# userData
    		$create['name'] = $user->name;
    		$create['email'] = $user->email;   	
    		$create['facebook_id'] = $user->id;
 
    		$userModel = new User;
    		$createdUser = $userModel->addNew($create);  
    		
    		Auth::loginUsingId($createdUser->id);
    		return Redirect::to('workbench');	
    	} catch (Exception $e) {
    		return Redirect::to('login');
    	}
    }
}
