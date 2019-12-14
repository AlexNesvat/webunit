<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show main blog page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBlog()
    {
        $posts = Post::with('user')->limit(10)->get()->toArray();
       // dd($posts);
        $test = '';
        Storage::disk('s3')->getDriver()/*->put('',$test)*/;
        return view('blog')->with(['posts' => $posts]);
    }

    public function showUserPublications(User $user)
    {
        $userProfile = $user->with('posts')->where('id','=',$user->id)->get()->toArray();
        return view('publications')->with(['user'=>$userProfile]);
    }
}
