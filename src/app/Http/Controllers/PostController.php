<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(5);;
        return view('post.index', compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $validator = $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'max:300'],
        ]);

        $path = $request->file('image')->store('public/img');

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'image' => basename($path),
            'content' => $request->content,
        ]);
        
        return redirect()->route('top');
    }

    public function show($id){
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }
}