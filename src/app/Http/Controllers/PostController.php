<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Post;
use \App\Tag;

class PostController extends Controller
{
    public function index()
    {
        $q = \Request::query();

        if(isset($q['name'])){

            $posts = Post::latest()->where('content', "like", "%#{$q['name']}%")->paginate(5);
            $name = $q['name'];
            $search_result = 'タグ： #' . $q['name'] . ' '. 'のレシピ' . ' ' . $posts->total() . ' ' . '件';
            return view('post.index', compact('posts', 'name', 'search_result'));

        }else {
            $search_result = '新着レシピ！！';
            $posts = Post::latest()->paginate(5);;
            return view('post.index', compact('posts', 'search_result'));
        }

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'max:2000'],
        ]);

        $path = $request->file('image')->store('public/img');

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->content, $match);
        
        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['name' => $tag]);

            array_push($tags, $found);
        }

        $tag_ids = [];

        foreach ($tags as $tag){
            array_push($tag_ids, $tag['id']);
        }

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->image = basename($path);
        $post->content = $request->content;
        
        $post->save();
        $post->tags()->attach($tag_ids);
        
        return redirect('/');
    }

    public function show(Post $post)
    {
        $defaultCount = count($post->likes);

        $defaultLiked = $post->likes->where('user_id', Auth::user()->id)->first();
        if(isset($defaultLiked)){
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }

        return view('post.show', compact('post', 'defaultCount', 'defaultLiked'));
    }

    public function search(Request $request)
    {

        $posts = Post::latest()->where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%")
                ->paginate(5);

        $search_query = $request->search;
        $search_result = '"' . $request->search . '" ' . 'の検索結果' . ' ' . $posts->total() . ' ' .'件';

        return view('post.index', compact('posts', 'search_result', 'search_query'));
    }
}