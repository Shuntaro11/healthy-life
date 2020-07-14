<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');

    }
    public function show($id)
    {
        $user = User::find($id);
        $user_posts = $user->posts()->latest()->get();
        return view('user.show', compact('user', 'user_posts'));
    }

    public function edit(){
        $auth = Auth::user();
        return view('user.edit', compact('auth'));
    }

    public function update(Request $request){
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'user_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $user = Auth::user();

        if(!empty($request['user_image'])){
            $path = $request['user_image']->store('public/img');
            $user->name = $request->name;
            $user->user_image = basename($path);
        }else{
            $user->name = $request->name;
        }
        $user->save();

        $user_posts = $user->posts()->latest()->get();
        return view('user.show', compact('user', 'user_posts'));
    }
}
