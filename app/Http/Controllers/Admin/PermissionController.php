<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.pages.Permission.manage', compact('permissions'));
    }


    public function create()
    {
        return view('admin.pages.Permission.create');
    }


    public function store(Request $request)
    {
        Permission::create(['name' => $request->name
                            , 'fa_name' => $request->fa_name]);
        return redirect()->route('permissions.index')->with([
            'alert-title' => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class' => 'success',
        ]);
    }


    public function edit(Permission $permission)
    {
        return view('admin.pages.Permission.update', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name
                            , 'fa_name' => $request->fa_name]);

        return redirect()->route('permissions.index')->with([
            'alert-title' => 'عملیات ویرایش رکورد با موفقیت انجام شد.',
            'alert-class' => 'success',
        ]);
    }


    public function destroy(Permission $permission)
    {
        if ($permission->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
