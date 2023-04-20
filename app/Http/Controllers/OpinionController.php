<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'opinion' => 'required',
            'cosmetic_id' => 'required|numeric|exists:cosmetics,id',
            'img'=>'image|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048|dimensions:min_width=100,min_height=100, max_width=2000, max_height2000',
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('opinions', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Auth::user()->opinions()->create($validated);
        return back()->with('message', __('message.opadd'));
    }

//    public function show(Comment $comment)
//    {
//        return view('comments.show', ['comments'=>$comment]);
//    }

    public function edit(Opinion $opinion)
    {
        $this->authorize('edit', $opinion);
        return view('opinions.edit',['opinions'=>$opinion]);
    }

    public function update(Request $request, Opinion $opinion)
    {
        $fileOpinion = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('opinions', $fileOpinion, 'public');
        $opinion->update([
            'opinion' => $request->input('opinion'),
            'img' => '/storage/'.$image_path,
        ]);
        Auth::user();

        return redirect()->route('cosmetics.show', ['cosmetic' => $opinion->cosmetic_id])->with('message', __('message.oped'));
    }


    public function destroy(Opinion $opinion)
    {
        $this->authorize('delete', $opinion);
        $opinion->delete();
        return back()->with('message', __('message.opdel'));
    }
}
