<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    // change Password Page
    public function changePasswordPage()
    {
        return view('admin.password.change');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);

        $dbUserID = Auth::user()->id;
        $dbUserData = User::select('password')->where('id', $dbUserID)->first();
        $dbUserPW = $dbUserData->password;

        if (Hash::check($request->currentpassword, $dbUserPW)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->newpassword)]);

            Auth::logout();
            return redirect()->route('auth#loginPage')->with(['pwChange' => 'Password Changed Sucessfully. Login again with your new password!']);
        } else {
            return back()->with(['pwNotMatch' => 'Try again. Your current password does not match!']);
        }


    }

    private function passwordValidationCheck($request)
    {
        Validator::make(
            $request->all(),
            [
                'currentpassword' => 'required',
                'newpassword' => 'required|min:6|different:currentpassword',
                'confirmpassword' => 'required|min:6|same:newpassword'
            ],
            [
                'newpassword.different' => 'New Password must not be same with current Password!',
                'confirmpassword.same' => 'Your confirm password does not match!'
            ]
        )->validate();
    }
}
