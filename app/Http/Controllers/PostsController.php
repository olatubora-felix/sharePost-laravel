<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(10);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post){

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request){
       $this->validate($request, [
           'body' => 'required',
           'image' => 'required',
       ]);

       $post_image = $request->file('image');

       $name_gen = hexdec(uniqid());
       $img_ext = strtolower($post_image->getClientOriginalExtension());

       $image_name = $name_gen.'.'.$img_ext;
       $up_location = 'images/posts/';
       $last_img = $up_location.$image_name;

       $post_image->move($up_location, $image_name);

        $request->user()->posts()->create([
            'body' => $request->body,
            'image' => $last_img 
        ]);

        return back();
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
       $post->delete();
       return back();
    }
}

