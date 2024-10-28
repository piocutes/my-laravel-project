<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view("notes.index", ["notes" => $notes]);
    }

    public function create()
    {
        return view("notes.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'body' => 'required|max:10000',
        ]);

        $data = $request->only(['title', 'body']);
        Note::create($data);
        
        return redirect()->route("notes.index")->with('success', 'Note created successfully!');
    }

    public function show(Note $note)
    {
        return view("notes.show", ["note" => $note]);
    }

    public function edit(Note $note)
    {
        return view("notes.edit", ["note" => $note]);
    }

    public function delete(Note $note)
    {
        return view("notes.delete", ["note" => $note]);
    }

    public function update(Note $note, Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'body' => 'required|max:10000',
        ]);

        $data = $request->only(['title', 'body']);
        $note->update($data);
        
        return redirect()->route("notes.index")->with('success', 'Note edited successfully!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route("notes.index")->with('success', 'Note deleted successfully!');
    }
}
