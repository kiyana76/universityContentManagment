<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\File;
use App\Models\GlobalField;
use App\Models\Resource;
use App\Utilities\FileUploader\Uploader;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index() {
        //when ever we use captcha in logined page you must clear captcha variable in session
        \Session::forget('captcha');
        $exams = Exam::all();
        return view('admin.pages.Exam.manage', compact('exams'));
    }

    public function create() {
        $fields = GlobalField::where('status', 'enable')->get();
        return view('admin.pages.Exam.create', compact('fields'));
    }

    public function store(Request $request) {
        $address = '';
        $examFields = [
            'year',
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
            'thumbnail_image'
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'year' => 'required|int',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $examData = $request->only($examFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;
        $resourceData['type'] = 'Exam';

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }

        if (isset($resourceData['thumbnail_image'])) {
            $address = Uploader::setModel(File::class)
                ->setType('image')
                ->setMax('1280')
                ->setInputName('thumbnail_image')
                ->create()
                ->address();
        } else {
            $address = 'thumbnail-default.jpg';
        }
        $resourceData['thumbnail_image'] = $address;

        $resource = Resource::create($resourceData);
        $resource->exam()->create($examData);
        $resource->fields()->attach($request->field_id);

        return redirect()->route('exams.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }

    public function edit(Exam $exam) {
        $fields = GlobalField::where('status', 'enable')->get();
        $fields_id = [];
        foreach ($exam->resource->fields as $i) {
            $fields_id [] = $i->id;
        }
        return view('admin.pages.Exam.update', compact('exam', 'fields', 'fields_id'));
    }

    public function update(Request $request, Exam $exam) {
        $resource = $exam->resource;
        $examFields = [
            'year',
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
            'thumbnail_image'
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'year' => 'required|int',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $examData = $request->only($examFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }

        if (isset($resourceData['thumbnail_image'])) {
            $resourceData['thumbnail_image'] = Uploader::setModel(File::class)
                ->setType('image')
                ->setMax('1280')
                ->setInputName('thumbnail_image')
                ->create()
                ->address();
        }

        $resource->update($resourceData);
        $exam->update($examData);
        $resource->fields()->sync($request->field_id);

        return redirect()->route('exams.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }

    public function destroy(Exam $exam) {
        $resource = $exam->resource;
        if ($exam->resource->files()->delete() && $exam->delete() && $resource->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
