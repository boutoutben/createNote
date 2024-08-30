<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index($id_theme){
        session()->put("theme",$id_theme);
        $user = DB::table("User")->where("id",'=',session()->get("user"))->first();
        $name = $user->username;
        $theme = DB::table("Theme")->where('id','=',$id_theme)->first();
        $notes = DB::table("Note")->where("id_user",session()->get("user"))->where("id_theme",$id_theme);
        return view("note", compact("id_theme","name","theme", "notes"));
    } 

    public function create($id_theme, Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        $note = new Note();
        $note->name = $name;
        $note->description = $description;
        $note->id_user = session()->get("user");
        $note->id_theme = $id_theme;
        $note->save();
        return redirect(route("note.index", $id_theme));
    }

    public function delete($id_note)
    {
        $note = Note::find($id_note);
        $note->delete();
        return redirect(route("note.index", `/note/`+session()->get("theme")));
    }

}
