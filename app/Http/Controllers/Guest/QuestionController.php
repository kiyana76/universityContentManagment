<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function single(Question $question) {
        return view('guest.questions.single', compact('question'));
    }

    public function list() {
        $questions = Question::whereHas('resource', function ($query) {
            $query->whereStatus('approve');
        })
            ->orderBy('created_at')
            ->paginate(10);
        return view('guest.questions.list', compact('questions'));
    }
}
