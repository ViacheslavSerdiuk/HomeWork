<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 6)->create()->each(function ($u){
            $u->posts()->saveMany(factory(\App\Post::class,rand(1,5))->make()
            );
        });
    }
}
