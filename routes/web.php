<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts', ['title' => 'Blog', 'posts' =>[
        [
            'title' => 'Artikel 1',
            'author' => 'Reza Maulana Ismail',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, corrupti excepturi dolores non doloribus dignissimos facere in, maxime voluptates fuga ea nobis praesentium maiores. Minus cum harum facilis velit reprehenderit.'
        ],
        [
            'title' => 'Artikel 2',
            'author' => 'Reza Maulana Ismail',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque magni minus eius non nemo dolores sit, vel et repellendus repudiandae vitae recusandae explicabo eum ullam cupiditate laboriosam. Repudiandae, molestias consequuntur.'
        ]
    ]]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
