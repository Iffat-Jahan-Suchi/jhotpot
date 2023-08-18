<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class ProfileController extends Controller
{
    private $user;

    public function changePAssword()
    {
        return view('admin.profile.change-password');
    }

    public function newPassword(Request $request)
    {
        {
            $this->user = User::find(Auth::user()->id);
            if (password_verify($request->old_password, $this->user->password)) {
                if ($request->new_password == $request->confirm_password) {
                    $this->user->password = bcrypt($request->new_password);
                    $this->user->save();
                    return redirect()->back()->with('message', 'Password update successfully.');
                } else {
                    return redirect()->back()->with('message', 'Sorry.. password & confirm password are not same.');
                }
            } else {
                return redirect()->back()->with('message', 'Sorry..your old password is not valid.');
            }
        }
    }
}
