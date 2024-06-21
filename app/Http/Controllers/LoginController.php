<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('account.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect('/home');
            } else {
                Session::flash('error', 'Password Salah');
                return redirect('/login');
            }
        } else {
            Session::flash('error', 'Email tidak ditemukan');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
