<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('/cosmetics');
        }
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role->name == "admin")
                return redirect()->intended('/emp/users');
            else if (Auth::user()->role->name == "moderator")
                return redirect()->intended('/emp/categories');
            else
                return redirect()->intended('/cosmetics');
        } else {
            return back()->withErrors(__('messages.incor'));
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('cosmetics.index');

    }
}
