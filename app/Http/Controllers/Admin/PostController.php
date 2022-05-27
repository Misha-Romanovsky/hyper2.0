<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->paginate(10);

        return view("admin.posts.index", [
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.posts.create", []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostFormRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostFormRequest $request)
    {
        Post::create($request->validated());

        return redirect(route("admin.posts.index"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view("admin.posts.create", [
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostFormRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect(route("admin.posts.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route("admin.posts.index"));
    }
}
