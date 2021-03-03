<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function single(Exam $exam) {
        return view('guest.exams.single', compact('exam'));
    }

    public function list() {
        $exams = Exam::whereHas('resource', function ($query) {
            $query->whereStatus('approve');
        })
            ->orderBy('created_at')
            ->paginate(10);
        return view('guest.exams.list', compact('exams'));
    }

}
