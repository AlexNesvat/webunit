<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Broadcasting\OrderChannel;
use App\Models\Post;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
//Broadcast::routes();

//Broadcast::channel('survey.{survey_id}', function ($user, $survey_id) {
//    return [
//        'id' => $user->id,
//        'image' => 'test',
//        'full_name' => 'test'
//    ];
//});

//Broadcast::channel('test-event');
//Route::get('test-broadcast', function(){
//    broadcast(new \App\Events\NewBroadcastNotification);
//});

//use App\Broadcasting\OrderChannel;

Broadcast::channel('order.{post}', function ($user, $post) {
    return $user->id === Post::findOrFail($post)->user_id;
});


//Broadcast::channel('private-order.{post}', OrderChannel::class);
//Broadcast::channel('order.{orderId}', function ($user, $orderId) {
//    return $user->id === Order::findOrNew($orderId)->user_id;
//});
