<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalField;
use App\Models\Note;
use App\Models\Resource;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() {
        $notes = Note::all();
        return view('admin.pages.Note.manage', compact('notes'));
    }

    public function create() {
        $fields = GlobalField::where('status', 'enable')->get();
        return view('admin.pages.Note.create', compact('fields'));
    }

    public function store(Request $request) {
        $noteFields = [
            'teacher_name',
            'year',
            'term',
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'teacher_name' => 'required',
            'year' => 'required|int',
            'term' => 'required|int',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $noteData = $request->only($noteFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }

        $resource = Resource::create($resourceData);
        $resource->note()->create($noteData);
        $resource->fields()->attach($request->field_id);

        return redirect()->route('notes.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }

    public function edit(Note $note) {
        $fields = GlobalField::where('status', 'enable')->get();
        return view('admin.pages.Note.update', compact('note', 'fields'));
    }

    public function update(Request $request, Note $note) {
        $resource = $note->resource;
        $noteFields = [
            'teacher_name',
            'year',
            'term',
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'teacher_name' => 'required',
            'year' => 'required|int',
            'term' => 'required|int',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $noteData = $request->only($noteFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }
        $resource->update($resourceData);
        $note->update($noteData);
        $resource->fields()->sync($request->field_id);

        return redirect()->route('notes.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }

    public function destroy(Note $note) {
        $resource = $note->resource;
        if ($note->delete() && $resource->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }


}
