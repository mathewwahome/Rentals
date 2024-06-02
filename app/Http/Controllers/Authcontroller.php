<?php

namespace App\Http\Controllers;

use App\Models\WebUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }
    public function userlogin(Request $request)
    {
        // dd('hey');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    public function newwebuser(Request $request)
    {
        $webuser = new WebUsers();

        $webuser->name = $request->username;
        $webuser->email = $request->email;
        $webuser->password = Hash::make($request->password);
        // verify to makesure that the 2 passowords match
        $saved = $webuser->save();
        if ($saved) {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
