<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Cosmetic;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $this->authorize('viewAny', User::class);
        $users=null;
        if($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->
                orWhere('email', 'LIKE', '%'.$request->search.'%')->
                with('role')->get();
        }
        else{
            $users=User::with('role')->get();
        }
        return view('emp.users', ['users'=>$users]);
    }
    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back()->with('message', __('message.ban') );
    }
    public function unban(User $user){
        $user->update([
            'is_active' => true ,
        ]);
        return back()->with('message', __('message.unban') );
    }
    public function edit(User $user){
        return view('emp.edit', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'role_id'=>$request->input('role_id'),
        ]);
        return redirect()->route('emp.users.index')->with('message', 'Role changed');
    }

    public function cart(){
        $cosmeticsInCart = Cart::where('status', 'ordered')->with(['cosmetic', 'user'])->get();
        return view('emp.cart', ['cosmeticsInCart'=>$cosmeticsInCart]);
    }

    public function order(){
        $cosmeticsInOrder = Auth::user()->cosmeticsWithStatus("confirmed")->get();
        return view('order.index', ['cosmeticsInCart'=>$cosmeticsInOrder, 'categories'=>Category::all()]);

//        $cosmeticsInCart = Cart::where('status', 'confirmed')->with(['cosmetic', 'user'])->get();
//        return view('order.index', ['cosmeticsInCart'=>$cosmeticsInCart]);
    }
//    public function showUsers(Request $request){
//        $users = null;
//        if($request->input('search')){
//            $users = User::where('name', 'LIKE', '%'.$request->input('search').'%')
//                ->orWhere('email', 'LIKE', '%'.$request->input('search').'%')
//                ->with('role')->get();
//        }else{
//            $users = User::with('role')->orderBy('email')->get();
//        }
  //  }
    public function confirm(Cart $cart){
        $cart->update([
           'status'=>'confirmed'
        ]);
        return back();
    }
    public function show(Cosmetic $cosmetic){
        return view('order.show', ['cosmetic'=>$cosmetic, 'categories' => Category::all()]);
    }

}
