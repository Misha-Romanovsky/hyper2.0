<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        /*

        $model = Post::with('comments.user')->orderBy('id');

        $hot = '';

        */

        $hot = Post::orderBy('id', 'DESC')->paginate(10);

        return view('posts.index', compact('posts', 'hot'));
    }

    public function show($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route('posts.show', $id));
    }
}
