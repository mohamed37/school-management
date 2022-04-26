<?php

namespace App\Http\Controllers\Auth;

use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    

    //use AuthenticatesUsers;
    use AuthTrait;
   
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {

        return view('auth.login',compact('type'));
    }

    public function login(Request $request)
    {
       if(Auth::guard($this->CheckGuard($request))->attempt(['email' => $request->email, 'password' => $request->password]))
       {
        return $this->redirect($request);
       }
    }

    public function logout(Request $request , $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
