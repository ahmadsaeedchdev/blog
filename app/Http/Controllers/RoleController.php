<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{


    public function create()
    {
        return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        $role = $request->validate(['name' => 'required']);
        Role::create(['name' => $role['name']]);
        return redirect(route('roles.index'));
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect(route('roles.index'));
    }

    public function viewPermissions(Request $request)
    {
        $permissions = Permission::all();
        $role = Role::find($request->id);

        return view('admin.layouts.partials.permissions', compact(['permissions', 'role']));
    }
}
