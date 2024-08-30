<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Theme;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class themeController extends Controller
{
    public function index()
    {
        $user = DB::table("User")->where("id",'=',session()->get("user"))->first();
        $name = $user->username;
        $theme = DB::table("Theme")->where("id_user",session()->get("user"));
        $allTheme = $theme->get();
        return view("theme", compact("name", "theme","allTheme"));
    }

    public function create(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        $theme = new Theme();
        $theme->name = $name;
        $theme->description = $description;
        $theme->id_user = session()->get("user");
        $theme->save();
        return redirect(route("theme.index"));
    }

    public function delete($id_theme)
    {
        $notes = DB::table("Note")->where("id_theme",$id_theme);
        if($notes->first()!= null)
        {
            foreach($notes->get() as $note)
            {
                $noteToDelete = Note::find($note->id);
                $noteToDelete->delete();
            }
        }

        $theme = Theme::find($id_theme);
        $theme->delete();
        return redirect(route("theme.index"));
    }
}
