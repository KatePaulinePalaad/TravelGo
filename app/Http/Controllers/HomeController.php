<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $destinationPopular = destination::where('popular','=',1)->paginate(3);
        return view('login.index')
        ->with([
            'destinationPopular' => $destinationPopular
        ]);;
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'Lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        $destinationPopular = destination::where('popular','=',1)->paginate(6);
        $destinationComing = destination::where('upcoming','=',1)->paginate(3);

        $user = Auth::user();
        return view('destination.index')
        ->with([
            'success' => 'You can now book a travel',
            'destinationPopular' => $destinationPopular,
            'destinationupcoming' => $destinationComing,
            'user' => $user
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('success','Logout Successfully');
    }
}
