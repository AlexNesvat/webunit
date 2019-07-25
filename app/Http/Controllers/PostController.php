<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPosts = Auth::user()->posts()->get()->toArray();
        //  dd($userPosts);

        return view('post.index')->with(['posts' => $userPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $validData = $request->validated();
        $imagePath = Storage::disk('public')->put('',$validData['post_image_file_name']);
        $validData['user_id'] = auth()->id();
        $validData['post_image_file_name'] = $imagePath;
        Post::create($validData);
        Session::flash('post_created', 'Post successfully created!');

        //TODO: validate requests, finish controller, create policy and create gate for admin
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with(['post' => $post]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $imagePath = Storage::disk('public')->put('',$data['post_image_file_name']);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->post_image_file_name = $imagePath;

        $post->save();
        Session::flash('post_updated', 'Post successfully updated!');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
