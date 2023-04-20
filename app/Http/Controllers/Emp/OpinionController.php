<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index(Request $request){
        $opinions = null;
        if($request->search){
            $opinions = Opinion::where('opinion','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $opinions = Opinion::all();
        }
        return view('emp.opinions', ['opinions' => $opinions]);
    }
    public function destroy(Opinion $opinion){
        $opinion->delete();
        return redirect()->route('emp.opinions.index')->with('message', 'Opinion is deleted');
    }
}
