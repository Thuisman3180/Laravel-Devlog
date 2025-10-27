<?php

namespace App\Http\Controllers;

use App\Models\Post;;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function home() {
        return view('home');
    }

    public function create() {
        return view('posts.create');

    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $path = $request->file('image')->storePublicly('posts', ['disk' => 'public']);


        $post->image = $path;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if ($request->file('image')) {
            $path = $request->file('image')->storePublicly('posts', ['disk' => 'public']);
            $post->image = $path;
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Edited successfully.');

    }

    public function edit($id) {

        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }
}
