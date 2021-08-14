<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;

class UserPostController extends Controller
{
   public function index(User $user){

      $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
   }

   public function profile(User $user){
      $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
      return view('users.profile.index', [
          'user' => $user,
          'posts' => $posts
      ]);
   }
}
