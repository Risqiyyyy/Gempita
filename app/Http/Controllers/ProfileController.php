<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function indexProfile() {
        return view('backend.pages.profile.index');
    }

    public function updateProfile($id, Request $request){

        $user = User::findOrFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

        Alert::success('Success', 'Profile Update successfully!!');
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The current password is incorrect.']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Success', 'Password Update successfully!!');
        return redirect()->route('profile.indexProfile')->with('success', 'Password updated successfully.');
    }
}
