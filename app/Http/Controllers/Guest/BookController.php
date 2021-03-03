<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function single(Book $book) {
        return view('guest.books.single', compact('book'));
    }

    public function list() {
        $books = Book::whereHas('resource', function ($query) {
            $query->whereStatus('approve');
        })
            ->orderBy('created_at')
            ->paginate(10);
        return view('guest.books.list', compact('books'));
    }

}
