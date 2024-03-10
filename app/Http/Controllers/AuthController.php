<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
