<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('emp.roles', ['roles'=>$roles]);
    }


    public function create(){
        $this->authorize('create', Role::class);
        return view('emp.createRole');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'role_kz' => 'required|max:255',
            'role_ru' => 'required|max:255',
            'role_en' => 'required|max:255',
        ]);
        Role::create($validated);
        return redirect()->route('emp.roles.store')->with('message', 'Role added!');}

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('emp.roles.index')->with('message', 'role is deleted');
    }
}
