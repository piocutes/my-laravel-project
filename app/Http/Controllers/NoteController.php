<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     */
    public function index()
    {
        $notes = Note::all();
        return view("notes.index", ["notes" => $notes]);
    }

    /**
     * Show the form for creating a new note.
     */
    public function create()
    {
        return view("notes.create");
    }

    /**
     * Store a newly created note in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'body'
        ]);

        $newNote = Note::create($data);
        
        return redirect()->route("notes.index")->with('success', 'Note created successfully!');
    }


    /**
     * Display the specified note.
     */
    public function show(Note $note)
    {
        return view("notes.show", ["note" => $note]);
    }


    /**
     * Show the form for editing the specified note.
     */
    public function edit(Note $note)
    {
        return view("notes.edit", ["note" => $note]);
    }

    /**
     * Show the confirmation form for deleting the specified note.
     */
    public function delete(Note $note)
    {
        return view("notes.delete", ["note" => $note]);
    }

    /**
     * Update the specified note in storage.
     */
    public function update(Note $note, Request $request)
    {
        $data = $request->only([
            'title',
            'body'
        ]);

        $note->update($data);
        return redirect()->route("notes.index")->with('success', 'Note edited successfully!');
    }

    /**
     * Remove the specified note from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route("notes.index")->with('success', 'Note deleted successfully!');
    }
}
