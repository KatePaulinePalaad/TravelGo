<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('SignIn.index');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if(Hash::check($request->password, $user->password)){
            if($user->Lastname == 'admin' || $user->Lastname == 'ADMIN'){
                Auth::login($user);
                return redirect()->route('admin.index')->with('success','Login Successfully');
            }else{
                 return redirect()->route('destination')->with('success','Login Successfully');
            }
        }else{
            return back()->with('error','Invalid Credentials');
        }
    }
}
