<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //direct login Page
    public function loginPage()
    {
        return view('login');
    }

    //direct register Page
    public function registerPage()
    {
        return view('register');
    }


    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#list');
        } else {
            return redirect()->route('user#home');
        }
    }
}
