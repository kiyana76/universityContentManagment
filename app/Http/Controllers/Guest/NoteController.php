<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function single(Note $note) {
        return view('guest.notes.single', compact('note'));
    }

    public function list() {
        $notes = Note::whereHas('resource', function ($query) {
           $query->whereStatus('approve');
        })
            ->orderBy('created_at')
            ->paginate(10);
        return view('guest.notes.list', compact('notes'));
    }
}
