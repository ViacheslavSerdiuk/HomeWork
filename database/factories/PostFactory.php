<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class,function (Faker $faker){
    return [
        'user_id' =>App\User::pluck('id')->random(),
        'title' => $faker->sentence,
        'body' =>$faker->paragraph,
        'image' => 'icon.png'
    ];
});