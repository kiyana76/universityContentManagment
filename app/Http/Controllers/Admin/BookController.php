<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalField;
use App\Models\Resource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        //when ever we use captcha in logined page you must clear captcha variable in session
        \Session::forget('captcha');
        $books = Book::all();
        return view('admin.pages.Book.manage', compact('books'));
    }

    public function create() {
        $fields = GlobalField::where('status', 'enable')->get();
        return view('admin.pages.Book.create', compact('fields'));
    }

    public function store(Request $request) {
        $bookFields = [
            'writer',
            'publisher',
            'edit'
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'writer' => 'required',
            'edit' => 'required|int',
            'publisher' => 'required',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $bookData = $request->only($bookFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;
        $resourceData['type'] = 'Book';

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }

        $resource = Resource::create($resourceData);
        $resource->book()->create($bookData);
        $resource->fields()->attach($request->field_id);

        return redirect()->route('books.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }

    public function edit(Book $book) {
        $fields = GlobalField::where('status', 'enable')->get();
        $fields_id = [];
        foreach ($book->resource->fields as $i) {
            $fields_id [] = $i->id;
        }
        return view('admin.pages.Book.update', compact('book', 'fields', 'fields_id'));
    }

    public function update(Request $request, Book $book) {
        $resource = $book->resource;
        $bookFields = [
            'writer',
            'publisher',
            'edit'
        ];
        $resourceFields = [
            'title',
            'description',
            'status',
        ];
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required',
            'writer' => 'required',
            'edit' => 'required|int',
            'publisher' => 'required',
            'field_id' => 'required'
        ];

        $this->validate($request, $rules);

        $bookData = $request->only($bookFields);
        $resourceData = $request->only($resourceFields);

        $resourceData['user_id'] = auth()->user()->id;

        if($resourceData['status'] == 'approve') {
            $resourceData['approve_by'] = auth()->user()->id;
        }
        $resource->update($resourceData);
        $book->update($bookData);
        $resource->fields()->sync($request->field_id);

        return redirect()->route('books.index')->with([
            'alert-title'  => 'عملیات ایجاد رکورد با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);
    }

    public function destroy(Book $book) {
        $resource = $book->resource;
        if ($book->resource->files()->delete() && $book->delete() && $resource->delete()) {
            return response()->json(['ok' => true], 200);
        }

        return response()->json(['ok' => false], 404);
    }
}
