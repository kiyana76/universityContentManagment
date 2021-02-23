<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Book, Exam, Resource, File, Note, Question};
use App\Utilities\FileUploader\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{

    public function uploadFile(Request $request, Resource $resource) {
        $rules = [
            'file' => 'required',
            'captcha' => 'required|captcha'
        ];
        $address = '';
        $request->validate($rules);
        switch ($resource->type) {
            case 'Note':
                $address = Uploader::setModel(Note::class)
                    ->setType('file')
                    ->setMax('5120')
                    ->setInputName('file')
                    ->create()
                    ->address();
                break;
            case 'Question':
                $address = Uploader::setModel(Question::class)
                    ->setType('file')
                    ->setMax('5120')
                    ->setInputName('file')
                    ->create()
                    ->address();
                break;
            case 'Book':
                //beacuase each book can have one file
                $file = $resource->files()->first();
                if ($file) {
                    return redirect()->back()->with([
                        'alert-title'  => 'به علت وجود یک فایل برای این کتاب امکان بارگذاری فایل دیگری وجود ندارد.',
                        'alert-class'  => 'danger',
                    ]);
                }
                $address = Uploader::setModel(Book::class)
                    ->setType('file')
                    ->setMax('30720')
                    ->setInputName('file')
                    ->create()
                    ->address();
                break;
            case 'Exam':
                $address = Uploader::setModel(Exam::class)
                    ->setType('file')
                    ->setMax('5120')
                    ->setInputName('file')
                    ->create()
                    ->address();
                break;

        }

        if(!$address)
            return redirect()->back()->with([
                'alert-title'  => 'بارگذاری فایل انجام نشد.',
                'alert-class'  => 'danger',
            ]);

        $resource->files()->create(['file' => $address]);
        return redirect()->back()->with([
            'alert-title'  => 'بارگذاری فایل با موفقیت انجام شد.',
            'alert-class'  => 'success',
        ]);

    }

    public function deleteFile(File $file) {

        if($file->delete())
            return response()->json(['ok' => true], 200);
        return response()->json(['ok' => false], 404);
    }
}
