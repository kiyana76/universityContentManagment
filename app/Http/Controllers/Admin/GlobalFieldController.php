<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalField;
use App\Models\GlobalGroup;
use Illuminate\Http\Request;

class GlobalFieldController extends Controller
{

    public function index()
    {
        $fields = GlobalField::all();
        return view('admin.pages.GlobalField.index', compact('fields'));
    }


    public function create()
    {
        $groups = GlobalGroup::where('status', 'enable')->get();
        return view('admin.pages.GlobalField.create', compact('groups'));
    }


    public function store(Request $request)
    {
        $fields = ['title', 'status', 'group_id'];

        $rules = [
            'title' => 'required',
            'status' => 'required',
            'group_id' => 'required'
        ];
        $this->validate($request, $rules);

        $data = $request->only($fields);

        GlobalField::create($data);

        return redirect()->route('fields.index')->with([
            'alert-title'  => 'عملیات درج رکورد جدید با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }


    public function edit(GlobalField $field)
    {
        $groups = GlobalGroup::where('status', 'enable')->get();
        return view('admin.pages.GlobalField.update', compact('field', 'groups'));
    }


    public function update(Request $request, GlobalField $field)
    {
        $fields = ['title', 'status', 'group_id'];

        $rules = [
            'title' => 'required',
            'status' => 'required',
            'group_id' => 'required'
        ];
        $this->validate($request, $rules);

        $data = $request->only($fields);

        $field->update($data);

        return redirect()->route('fields.index')->with([
            'alert-title'  => 'عملیات ویرایش رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }


    public function destroy(GlobalField $field)
    {
        if ($field->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
