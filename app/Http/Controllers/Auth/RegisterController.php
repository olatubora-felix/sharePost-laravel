<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function __construct(){
        $this->middleware('guest');
    }


    public function index(){
        return view('auth.register');
    }


    // Validate and Register User
    public function store(Request $request){
        // Validate incoming request
        $this->validate($request, [
            'name' => 'required|max:225',
            'username' => 'required|max:225',
            'email' => 'required|email|max:225',
            'password' => 'required|confirmed',

        ]);

        // Store User 
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
