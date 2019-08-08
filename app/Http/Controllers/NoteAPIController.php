<?php

namespace App\Http\Controllers;

use App\Note;
use App\Http\Resources\NoteCollection;
use App\Http\Resources\NoteResource;
 
class NoteAPIController extends Controller
{
    public function index()
    {
        return new NoteCollection(Note::paginate());
    }
 
    public function show(Note $note)
    {
        return new NoteResource($note->___LOAD_RELATIONSHIPS___);
    }

    public function store(Request $request)
    {
        return new NoteResource(Note::create($request->all()));
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());

        return new NoteResource($note);
    }

    public function destroy(Request $request, Note $note)
    {
        $note->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}