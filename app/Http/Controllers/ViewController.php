<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function register()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('registration');
    }


    public function login()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login'); 
    }



    public function logout()
    {

        Auth::logout();
        return redirect('/');

    }

    public function forgottenPassword() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('forgottenPassword');
    }

    public function otpCode() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('otp');
    }

    public function newPassword() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('newPassword');
    }
}
