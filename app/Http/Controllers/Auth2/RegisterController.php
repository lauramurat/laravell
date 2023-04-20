<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function  register(Request $request){
         $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' =>'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>Hash::make($request->input('password')),
//            'role_id' => Role::where('name', 'user')->first()->id,
        ]);

        Auth::login($user);

        return redirect()->route('cosmetics.index');
    }

    public function balance(User $user) {
        return view('auth.balance', ['users'=>$user, 'categories' => Category::all()]);
    }

    public function addBalance(Request $request, User $user) {
        Auth::user()->update([
            'payment'=>Auth::user()->payment+$request->input('payment'),
        ]);

        Auth::user();
        return redirect()->route('users.balance', [$user->id])->with('message',__('message.balanceUpdate'));
    }
//    public function DelBalance(Request $request){
//        Auth::user()->update([
//            'payment'=>Auth::user()->payment-,
//        ]);
//    }



}
