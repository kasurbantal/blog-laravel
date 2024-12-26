<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

// route untuk menampilkan single post dalam blog dengan $slug dengan metode Route Model Binding
// Route Model Binding, secara otomatis mengambil data Post berdasarkan nilai slug tanpa perlu menggunakan find() secara manual.
// Cara kerjanya adalah:
// 1. Bagian {post:slug} memberi tahu Laravel untuk mencocokkan nilai dari parameter URL (slug) dengan kolom slug di model Post.
// 2. Model Post harus memiliki slug yang unik untuk setiap entri agar ini berfungsi dengan benar.

Route::get('/posts/{post:slug}', function (Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user-> name, 'posts' => $user->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
