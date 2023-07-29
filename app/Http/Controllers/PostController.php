<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('post.create', [
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(Request $request)
    {

        Post::create($request->only('title', 'category_id', 'thumbnail', 'content'));

        return back()->with('success', $request->all());
    }

    public function show($id)
    {
        return view('post.show', [
            'post' => Post::whereId($id)->first()
        ]);
    }
    public function edit($id)
    {
        return view('post.edit', [
            'post' => Post::whereId($id)->first()
        ]);
    }

    public function destroy($id)
    {
        Post::whereId($id)->delete();

        return back()->with('success', 'Successfully deleted post');
    }
}
