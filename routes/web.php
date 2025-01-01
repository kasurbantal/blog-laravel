<?php

use App\Models\Category;
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

//Eager Loading
Route::get('/posts', function () {
    $posts = Post::with(['author','category'])->latest()->get(); // Mengambil semua data post dengan relasi author dan category, sekaligus mengurutkan dari yang terbaru.
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);  // Mengirim data post yang sudah diambil ke view 'posts' dengan judul 'Blog'.
});

// route untuk menampilkan single post dalam blog dengan $slug dengan metode Route Model Binding
// Route Model Binding, secara otomatis mengambil data Post berdasarkan nilai slug tanpa perlu menggunakan find() secara manual.
// Cara kerjanya adalah:
// 1. Bagian {post:slug} memberi tahu Laravel untuk mencocokkan nilai dari parameter URL (slug) dengan kolom slug di model Post.
// 2. Model Post harus memiliki slug yang unik untuk setiap entri agar ini berfungsi dengan benar.

Route::get('/posts/{post:slug}', function (Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

//Lazy Eager Loading
Route::get('/authors/{user:username}', function (User $user) {
    // Mengambil semua post yang ditulis oleh user berdasarkan username
    // dan memuat relasi category dan author untuk setiap post secara efisien
    $posts = $user->posts->load(['category', 'author']);

    // Mengembalikan view posts dengan judul dinamis yang mencantumkan
    // jumlah artikel dan nama penulis, serta data post yang telah dimuat
    return view('posts', ['title' => count($posts) . ' Articles by ' . $user-> name, 'posts' => $posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => count($category->posts) . ' Articles in Category: ' . $category->slug,
    'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
