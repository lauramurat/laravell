<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Cosmetic;
use App\Models\Opinion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;


class CosmeticController extends Controller
{
    public function buy(){
        $productsSize=null;
        if(Auth::check()){
            $ids=Auth::user()->productsWithStatus("in_cart")->allRelatedIds();
            $productsSize=Auth::user()->productsWithStatus("in_cart")->get();
            if (Auth::user()->account > $productsSize->price){
                Auth::user()->update(['account' => Auth::user()->account - $productsSize->price]);
                foreach ($ids as $id){
                    Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($id, ['status' => 'ordered']);
                }
            }else{
                return back()->with('message', __('messages.money'));
            }
        }


        return back();
    }

    public function rate(Cosmetic $cosmetic, Request $request)
    {
        $request->validate([
            'rating' => 'required|min:1|max:5'
        ]);

        $cosmeticRated = Auth::user()->cosmeticsRated()->where('cosmetic_id', $cosmetic->id)->first();
        if ($cosmeticRated != null) {
            Auth::user()->cosmeticsRated()->updateExistingPivot($cosmetic->id, ['rating' => $request->input('rating')]);
        } else {
            Auth::user()->cosmeticsRated()->attach($cosmetic->id, ['rating' => $request->input('rating')]);
        }
        return back()->with('message', __('message.rtd'));
    }

    public function unrate(Cosmetic $cosmetic)
    {
        $cosmeticRated = Auth::user()->cosmeticsRated()->where('cosmetic_id', $cosmetic->id)->first();

        if ($cosmeticRated != null) {
            Auth::user()->cosmeticsRated()->detach($cosmetic->id);
        }
        return back()->with('message', __('message.unrtd'));
    }

    public function cosmeticsByCat(Category $category)
    {
        return view('cosmetics.index', ['cosmetics' => $category->cosmetics, 'categories' => Category::all()]);

    }

    public function index()
    {
        $cosmetics = Cosmetic::with('opinions.user')->get();
        return view('cosmetics.index', ['cosmetics'=>$cosmetics, 'categories' => Category::all()]);
    }
    public function view()
    {
        $cosmetics = Cosmetic::all();
        return view('emp.cosmetics', ['cosmetics'=>$cosmetics]);
    }

    public function create()
    {
//        $this->authorize('create', Cosmetic::class);
        return view('cosmetics.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name_kz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'composition_kz' => 'required',
            'composition_ru' => 'required',
            'composition_en' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'img'=>'required|image|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048|dimensions:min_width=100,min_height=100, max_width=2000, max_height2000',

        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('cosmetics', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Auth::user()->cosmetics()->create($validated);

        return redirect()->route('cosmetics.index')->with('message', __('message.add'));
    }

    public function show(Cosmetic $cosmetic)
    {
        $cosmetic->load('opinions.user');

        $myRating = 0;
        if(Auth::check()){
            $cosmeticRated = Auth::user()->cosmeticsRated()->where('cosmetic_id', $cosmetic->id)->first();
            if($cosmeticRated != null)
                $myRating = $cosmeticRated->pivot->rating;
        }

        $avgRating = 0;
        $sum = 0;
        $ratedUsers = $cosmetic->usersRated()->get();
        foreach ($ratedUsers as $ru){
            $sum += $ru->pivot->rating;
        }
        if(count($ratedUsers)>0)
            $avgRating = $sum/count($ratedUsers);

        return view('cosmetics.show', ['cosmetic'=>$cosmetic, 'categories'=>Category::all(), 'myRating'=>$myRating, 'avgRating'=>$avgRating]);

    }


    public function edit(Cosmetic $cosmetic)
    {
        $this->authorize('edit', $cosmetic);
        return view('cosmetics.edit', ['cosmetic'=>$cosmetic, 'categories' => Category::all()]);
    }

    public function update(Request $request, Cosmetic $cosmetic)
    {

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('cosmetics', $fileName, 'public');

        $cosmetic->update([
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'composition_kz' => $request->input('composition_kz'),
            'composition_ru' => $request->input('composition_ru'),
            'composition_en' => $request->input('composition_en'),
            'price'=>$request->input('price'),
            'category_id'=>$request->input('category_id'),
            'img' => '/storage/'.$image_path,
        ]);


        Auth::user();

        return redirect()->route('cosmetics.index')->with('message', __('message.edited') );
    }
    public function destroy(Cosmetic $cosmetic)
    {
        $this->authorize('delete', $cosmetic);
        $cosmetic->delete();
        return redirect()->route('cosmetics.index')->with('message', __('message.delete'));
    }
}
