<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.pages.Role.manage', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('admin.pages.Role.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name,
                      'fa_name' => $request->fa_name]);
        $role->syncPermissions($request->permissions_id);
        return redirect()->route('roles.index')->with([
        'alert-title' => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
        'alert-class' => 'success',
    ]);
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role_permissions_id = [];
        foreach ($role->permissions as $item) {
            $role_permissions_id [] = $item->id;
        }
        return view('admin.pages.Role.update', compact('role', 'permissions', 'role_permissions_id'));
    }


    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name,
                       'fa_name' => $request->fa_name]);
        $role->syncPermissions($request->permissions_id);
        return redirect()->route('roles.index')->with([
            'alert-title' => 'عملیات ویرایش رکورد با موفقیت انجام شد.',
            'alert-class' => 'success',
        ]);
    }


    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }

    public function allUsers() {
        $users = User::whereType('user')->get();
        return view('admin.pages.Role.users', compact('users'));
    }

    public function editUserRole(User $user){
        $roles = Role::all();
        $user_roles_id = [];
        foreach ($user->roles as $item) {
            $user_roles_id [] = $item->id;
        }

        return view('admin.pages.Role.update-user', compact('user', 'roles', 'user_roles_id'));
    }

    public function updateUserRole(Request $request, User $user){
        $user->syncRoles($request->roles_id);
        return redirect()->route('all-users')->with([
            'alert-title' => 'عملیات ویرایش رکورد با موفقیت انجام شد.',
            'alert-class' => 'success',
        ]);
    }
}
