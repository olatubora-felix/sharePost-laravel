<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(){
            $users = Auth::user();
        return view('dashboard.index', compact('users'));
   }

   public function create(){
        $users = Auth::user();
       return view('dashboard.create',compact('users'));
   }

   public function update(Request $request, User $user){

    // $image = $request->name;
    // dd($image);

        $userUpdate = Auth::user();
       
        $this->validate($request, [
            'job' => 'required',
            'image' => 'required',
            'description' => 'required|unique:users|min:30',
        ], 
        [
            'description.required' => 'Please Input Bio',
            'description' => 'Bio Must be at least 30 character',
        ]);

       $image = $request->file('image');

       $name_gen = hexdec(uniqid());
       $img_ext = strtolower($image->getClientOriginalExtension());
       $image_name = $name_gen.'.'.$img_ext;
       $up_location = 'images/profile/';
       $last_img = $up_location.$image_name;

       $image->move($up_location, $image_name);

        // Store User 
        $userUpdate->update([
            'name' => strip_tags($request->name),
            'username' => strip_tags( $request->username),
            'email' => strip_tags($request->email),
            'job' => strip_tags( $request->job),
            'image' => $last_img,
            'description' => strip_tags($request->description),
        ]);

        return redirect()
               ->route('dashboard');
   }
}



