<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Post {
    public static function all() {
        return [
            [
                'id' => 1,
                'slug' => 'artikel-1',
                'title' => 'Artikel 1',
                'author' => 'Reza Maulana Ismail',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, corrupti excepturi dolores non doloribus dignissimos facere in, maxime voluptates fuga ea nobis praesentium maiores. Minus cum harum facilis velit reprehenderit.'
            ],
            [
                'id' => 2,
                'slug' => 'artikel-2',
                'title' => 'Artikel 2',
                'author' => 'Reza Maulana Ismail',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque magni minus eius non nemo dolores sit, vel et repellendus repudiandae vitae recusandae explicabo eum ullam cupiditate laboriosam. Repudiandae, molestias consequuntur.'
            ]
            ];
    }
}

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

// route untuk menampilkan single post dalam blog
Route::get('/posts/{slug}', function ($slug) {
        $post = Arr::first(Post::all(), function ($post) use ($slug) {
            return $post['slug'] == $slug;
        });
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
