<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\AssignOp\Concat;

class homeController extends Controller
{
    public function index(){
        return view("home");
    }

    public function create(Request $request){
        $username = $request->input("newUsername");
        $password = $request->input("newPassword");
        if(isset($username)&&isset($password)){
            $user = new User();
            $user->username = $username; 
            $user->password = Hash::make($password);
            $user->save();
            
            return redirect(route("home.index"));
        }
        

        return "error";
    }

    public function connection(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input('password');
        if(isset($username)&&isset($password))
        {
            $user = DB::table("User")->where("username","=",$username)->first();
                if($user != null){
                    if (Hash::check($password, $user->password)) {
                        session()->put('user', $user->id);
                        session()->put("error", "");
                        return redirect(route("theme.index"));
                    }
                    else{
                        session()->put("error", "auth");
                    }
                    
                }
                session()->put("error", "auth");
                return redirect(route("home.index"));
        }
    }

    public function disconnect()
    {
        session()->put("user","");
        return redirect(route("home.index"));
    }
    
}

