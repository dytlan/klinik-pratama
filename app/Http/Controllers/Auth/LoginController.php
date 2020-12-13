<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if($user->role->nama == 'admin'){
            return redirect('/admin');
        } else if ($user->role->nama == 'resepsionis'){
            return redirect('/resepsionis');
        } else

        switch ($user->role->nama) {
            case 'admin':
                return redirect('/admin');
                break;
            case 'resepsionis':
                return redirect('/resepsionis');
            case 'dokter':
                return redirect('/dokter');
            case 'bidan' :
                return redirect('/dokter');
            case 'apoteker':
                return redirect('/apoteker');    
            default:
                return redirect()->back();
                break;
        }
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
