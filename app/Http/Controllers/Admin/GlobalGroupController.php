<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalGroup;
use Illuminate\Http\Request;

class GlobalGroupController extends Controller
{
    public function index()
    {
        $groups = GlobalGroup::all();
        return view('admin.pages.GlobalGroup.index', ['groups' => $groups]);
    }


    public function create()
    {
        return view('admin.pages.GlobalGroup.create');
    }


    public function store(Request $request)
    {
        $fields = ['title', 'status'];

        $rules = [
            'title' => 'required',
            'status' => 'required'
        ];
        $this->validate($request, $rules);

        $data = $request->only($fields);

        GlobalGroup::create($data);

        return redirect()->route('groups.index')->with([
            'alert-title'  => 'عملیات درج رکورد جدید با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }


    public function show(GlobalGroup $group)
    {
        //
    }


    public function edit(GlobalGroup $group)
    {
        return view('admin.pages.GlobalGroup.update', compact('group'));
    }


    public function update(Request $request, GlobalGroup $group)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required'
        ];
        $this->validate($request, $rules);
        $fields = ['title', 'status'];

        $data = $request->only($fields);
        $group->update($data);
        return redirect()->route('groups.index')->with([
            'alert-title'  => 'عملیات ویرایش رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }


    public function destroy(GlobalGroup $group)
    {
        if ($group->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
