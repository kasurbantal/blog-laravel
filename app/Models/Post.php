<?php
namespace App\Models;
use Illuminate\Support\Arr;

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

    public static function find($slug): array
    {
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if (! $post) {
            abort(404);
        }
        return $post;
    }
}
