<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

    public function getLogin()
    {

        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('login')->with('message', 'Login Failed ! please check your username and password');
        }
    }

    public function postLogin(Request $request)
    {
        $auth = Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1]);

        if ($auth) {
            \Session::put('connected_user_name', Auth::user()->name);
            \Session::put('connected_user_email', Auth::user()->email);
            \Session::put('connected_user_id', Auth::user()->id);
            \Session::put('connected_user_acces', Auth::user()->acces);
            \Session::put('connected_user_photo', Auth::user()->photo);
            \Session::put('connected_user_lang', Auth::user()->lang);
        }

        if ($auth) {
            return redirect()->route('dashboard');
        }
        return redirect('/')->with('message', 'Login Failed ! please check your username and password');
    }

    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
