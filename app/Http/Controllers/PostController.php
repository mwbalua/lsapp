<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    // equivalent of except(['index', 'show'])->middleware('auth');
    // public function __construct() {
    //     $this->middleware('auth', ['except' => ['index', 'show']]);
    // }

    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(3);

        return view('posts.index', ['title' => 'Posts', 'posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create', ['title' => 'Create a New Post']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'cover_image' => ['image', 'nullable', 'max:1999']
        ]);

        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalExtension();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $data['user_id'] = auth()->user()->id;
        $data['cover_image'] = $fileNameToStore;

        Post::create($data);

        return redirect("/posts")->with('success', 'Post created successfully');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized');
        }

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'cover_image' => ['image', 'nullable', 'max:1999']
        ]);

        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalExtension();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = Post::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->update($data);

        return redirect("/posts/$post->id")->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized');
        }

        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        $post->deleteOrFail();

        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
}
