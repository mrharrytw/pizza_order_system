<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // view user home
    public function userhome()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('user.main.home', compact('products', 'categories'));
    }

    // view user home with category filter
    public function filterCategory($id)
    {
        // dd($id);
        $products = Product::where('category_id', $id)->get();
        $categories = Category::get();
        return view('user.main.home', compact('products', 'categories'));
    }

    // view account
    public function viewAccount()
    {
        return view('user.profile.account');
    }

    // edit account
    public function editAccount($id)
    {
        return view('user.profile.editaccount');
    }

    // update account
    public function updateAccount($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // Image Upload and old Image delete
        if ($request->hasFile('image')) {

            $oldImageName = User::find($id)->image;
            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $newImageName = uniqid() . "_admin_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $newImageName);
            $data['image'] = $newImageName;

        }
        User::where('id', $id)->update($data);
        return redirect()->route('user#viewaccount')->with(['accountInfoChanged' => 'You have updated User account Infomation']);
    }

    // view change password
    public function changepwpage()
    {
        return view('user.password.changepassword');
    }

    // change and update password
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


    // the following are private functions
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
            'image' => 'mimes:png,jpg,jpeg|file'
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
