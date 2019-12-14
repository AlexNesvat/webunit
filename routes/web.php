<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Events\NewBroadcastNotification;
use App\Models\Post;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/','HomeController@showBlog')->name('blog');
Route::get('/publications/{user}','HomeController@showUserPublications')->name('publications');
Route::post('/follow/{user}', 'UsersController@follow')->name('follow');
Route::delete('/unfollow/{user}', 'UsersController@unfollow')->name('unfollow');

Route::resource('/post', 'PostController')->middleware('auth');

Route::prefix('/admin')->middleware('can:admin')->group(function (){
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
    Route::delete('/delete-user/{user}','AdminController@deleteUser');
});


Route::get('test', function (){
    event(new NewBroadcastNotification(auth()->user(),Post::find(252)));

});

Route::get('my/{post}',function (Post $post){
   return view('post.show')->with(['post' => $post]);
});

//Broadcast::routes();
