<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'user_id' => App\Models\User::all()->random()->user_id,
        'date_of_publication' => $faker->dateTime,
        'post_image_file_name' => $faker->image(null,640,480,null,false),

    ];
});
