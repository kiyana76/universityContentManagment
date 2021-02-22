<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalField;
use App\Models\Question;
use App\Models\Resource;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        //when ever we use captcha in logined page you must clear captcha variable in session
        \Session::forget('captcha');
        $questions = Question::all();
        return view('admin.pages.Question.manage', compact('questions'));
    }

    public function create() {
        $fields = GlobalField::where('status', 'enable')->get();
        return view('admin.pages.Question.create', compact('fields'));
    }

    public function store(Request $request) {
        $questionFields = [
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

        $questionData = $request->only($questionFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;
        $resourceData['type'] = 'Question';

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }

        $resource = Resource::create($resourceData);
        $resource->question()->create($questionData);
        $resource->fields()->attach($request->field_id);

        return redirect()->route('questions.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }

    public function edit(Question $question) {
        $fields = GlobalField::where('status', 'enable')->get();
        $fields_id = [];
        foreach ($question->resource->fields as $i) {
            $fields_id [] = $i->id;
        }
        return view('admin.pages.Question.update', compact('question', 'fields', 'fields_id'));
    }

    public function update(Request $request, Question $question) {
        $resource = $question->resource;
        $questionFields = [
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

        $questionData = $request->only($questionFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }
        $resource->update($resourceData);
        $question->update($questionData);
        $resource->fields()->sync($request->field_id);

        return redirect()->route('questions.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }

    public function destroy(Question $question) {
        $resource = $question->resource;
        if ($question->resource->files()->delete() && $question->delete() && $resource->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
