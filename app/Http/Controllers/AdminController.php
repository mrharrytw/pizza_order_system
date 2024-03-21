<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // change Password Page
    public function changePasswordPage()
    {
        return view('admin.account.changepassword');
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

    // direct view details page
    public function details()
    {
        return view('admin.account.details');
    }

    // direct view edit admin profile
    public function edit()
    {
        return view('admin.account.edit');
    }

    // update admin account
    public function update($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // Image Upload and old Image delete
        if ($request->hasFile('image')) {
            $oldImageName = User::find($id)->image;

            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $newImage = uniqid() . "_admin_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $newImage);
            $data['image'] = $newImage;

        }

        User::where('id', $id)->update($data);
        return redirect()->route('admin#details')->with(['accountInfoChanged' => 'You have updated Admin account Infomation']);
    }

    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }

    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ])->validate();
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
