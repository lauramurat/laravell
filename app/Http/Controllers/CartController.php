<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Cosmetic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function putToCart(Request $request, Cosmetic $cosmetic){
        $cosmeticsInCart = Auth::user()->cosmeticsWithStatus("in_cart")->where('cosmetic_id', $cosmetic->id)->first();

        if($cosmeticsInCart != null)
            Auth::user()->cosmeticsWithStatus("in_cart")->updateExistingPivot($cosmetic->id,
            ['quantity'=>$cosmeticsInCart->pivot->quantity+$request->input('quantity')]);
        else
            Auth::user()->cosmeticsWithStatus("in_cart")->attach($cosmetic->id);

        return back()->with('message', __('message.cartadd'));
    }

    public function deleteFromCart(Cosmetic $cosmetic){
        $cosmeticsBought = Auth::user()->cosmeticsWithStatus("in_cart")->where('cosmetic_id', $cosmetic->id)->first();

        if($cosmeticsBought != null)
            Auth::user()->cosmeticsWithStatus("in_cart")->detach($cosmetic->id);
        return back()->with('message', __('message.deleteadd'));
    }

    public function index()
    {
        $cosmeticsInCart = Auth::user()->cosmeticsWithStatus("in_cart")->get();
        return view('cart.index', ['cosmeticsInCart'=>$cosmeticsInCart, 'categories'=>Category::all()]);
    }

    public function buy()
    {
        $ids = Auth::user()->cosmeticsWithStatus("in_cart")->allRelatedIds();
        foreach ($ids as $id){
            Auth::user()->cosmeticsWithStatus("in_cart")->updateExistingPivot($id, ['status'=>'ordered']);
        }
        return back()->with('message', __('message.buy'));
    }


}
