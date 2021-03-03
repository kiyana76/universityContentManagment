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
}
