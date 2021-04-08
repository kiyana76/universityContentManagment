<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\{Book, Exam, Note, Question, Resource};
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $resources = Resource::approve()
                            ->orderBy('created_at')
                            ->get()
                            ->take(20);

        $books = Book::whereHas('resource', function ($q){
                    $q->whereStatus('approve');
                    })
                    ->orderBy('created_at')
                    ->get()
                    ->take(4);

        $notes = Note::whereHas('resource', function ($q){
                    $q->whereStatus('approve');
                })
                    ->orderBy('created_at')
                    ->get()
                    ->take(4);

        $questions = Question::whereHas('resource', function ($q){
                    $q->whereStatus('approve');
                })
                    ->orderBy('created_at')
                    ->get()
                    ->take(4);

        $exams = Exam::whereHas('resource', function ($q){
                    $q->whereStatus('approve');
                })
                    ->orderBy('created_at')
                    ->get()
                    ->take(4);
        return view('guest.index', compact('resources', 'books', 'notes', 'exams', 'questions'));
    }
}
