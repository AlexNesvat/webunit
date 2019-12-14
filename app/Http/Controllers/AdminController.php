<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    /**
     * Show dashboard table for admin with users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('posts')->get()->toArray();

        return view('admin.index')->with(['users' => $users]);
    }

    public function deleteUser(User $user)
    {

        $user->delete();
        Session::flash('user_deleted', 'User successfully deleted!');

        return redirect()->route('admin.dashboard');
    }
}
