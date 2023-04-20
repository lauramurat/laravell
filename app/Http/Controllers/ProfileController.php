<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function deposit(User $user){
        return view('auth.deposit',['user'=>$user]);
    }
    public function add_deposit(Request $request, User $user){
        Auth::user()->update([
            'money'=>Auth::user()->money+$request->input('money'),
        ]);
        return redirect()->route('account',[$user->id])->with('message',__('messages.added_suc'));
    }

    public function buy_deposit(Request $request, User $user){
//        if($request>0){
        $count=(int)$request->myTicket;
        $user->update([
            'money'=>$request->input('request'),
        ]);
        return view('auth.profile',[$user->id,'count'=>$count])->with('message',__('messages.bought_suc'));
        }
//        else{
//            return redirect()->route('account',[$user->id])->with('message',__('messages.aksha'));
//
//        }
}
