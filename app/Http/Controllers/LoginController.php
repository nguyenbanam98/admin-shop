<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

  
    
    public function getLogin()
    {
        return view('fontend.page.auth.login');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('rememberme') ? true : false;

        if (Auth::guard('shops')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {

            return redirect('/');
        }

        return redirect()->back()->with('error-login','Bạn đăng nhập thất bại');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
}
