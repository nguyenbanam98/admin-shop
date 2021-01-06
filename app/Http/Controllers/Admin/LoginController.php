<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('rememberme') ? true : false;

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {

            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('error-login','Bạn đăng nhập thất bại');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
}