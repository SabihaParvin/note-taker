<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function noteList(){
        $notes=Note::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->paginate(5);
        return view('pages.notes.list', compact('notes'));
    }

    public function addNote(){
        return view('pages.notes.create');
    }

    public function noteStore(Request $request){

        $validated = Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validated->fails()) {
            notify()->error('Failed to store.');
            return redirect()->back();
        }

        Note::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        notify()->success('Created successfully.');
        return redirect()->route('note.list');
    }

   

    public function noteEdit($postId) {
        $note = Note::find($postId);
         return view('pages.notes.edit', compact('note'));   
    }

    public function noteUpdate(Request $request, $noteId) {
        
        $note = Note::find($noteId);
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        if($validated->fails()){
            return redirect()->back();
        }

        $note -> update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        notify()->success('Note Updated .');
        return redirect()->route('note.list');
    }

    public function noteDelete($noteId) {

        Note::find($noteId)->delete();
        
        notify()->success('Note Deleted ');
        return redirect()->route('note.list');
    }

    public function search(Request $request)
    {
        if (auth()->user()->user_type == 'admin') {
            abort(403, 'Unauthorized action.');
        }
    
        $request->validate([
            'search' => 'nullable|string', 
        ]);
    
        $searchQuery = $request->search;
    
        if ($searchQuery) {
            $notes = Note::where('title', 'LIKE', '%' . $searchQuery . '%')->get(); 
            return view('pages.notes.search', compact('notes', 'searchQuery'));
        } else {
            return "Nothing found!";
        }
    }
    
}
