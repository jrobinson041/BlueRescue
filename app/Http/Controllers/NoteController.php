<?php

namespace App\Http\Controllers;

use App\Note;
use App\DispatchFeed;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function addNote(Request $request) {

        $this->validate($request, [
            'note' => 'required|max:255',
            'address' => 'required|max:255',
            'id' => 'required|max:255'
        ]);

        $note = new Note;
        $note->note = $request->note;
        $note->address = $request->address;
        $note->save();
        
        $id = $request->id;

        return redirect('/dispatch/'.$id);
    }

    //Delete a note by ID
    public function deleteNote($id, $noteid) {
        Note::findOrFail($noteid)->delete();

        return redirect('/dispatch/'.$id);
    }
}
