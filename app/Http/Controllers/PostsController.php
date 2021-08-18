<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        // dd(request('image')->store('uploads', 'public'));
        // temp local storage, only for dev stage
        $imagePath = request('image')->store('uploads', 'public');

        // cut image to square shape
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // Post::create($data);
        // getting the user ID while being logged in
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        // dd(request()->all());
        return redirect('/profile/' . auth()->user()->id);
    }

    // Post $post retreives the current post with the specified id
    public function show(Post $post)
    {
        // dd($post);

        // return view('posts.show', ['post' => $post,]);
        // same function as the previous statement, but using the function compact for same name attributes.
        return view('posts.show', compact('post'));
    }
}
