<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    
    public function index()
    {
        return Note::all();
    }


    public function create()
    {
        // no need (html )
    }


    public function store(Request $request)
    {
        $note = Note::create($request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
        ]));

        return response()->json($note, 201);
    }


     public function show(Note $note)
    {
        return $note;
    }


    public function edit(Note $note)
    {
        // no need (html )
    }

        public function update(Request $request, Note $note)
    {
        $note->update($request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'nullable|string',
        ]));

        return response()->json($note);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}
