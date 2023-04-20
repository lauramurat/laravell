<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('emp.categories', ['categories'=>$categories]);
    }

    public function create()
    {
        return view('emp.createCategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        Category::create($validated);
        return redirect()->route('emp.categories.store')->with('message', 'Category added!');}



    public function show(Category $category)
    {

    }


    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {

    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('emp.categories.index')->with('message', 'Category is deleted');
    }
}
