<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Faker\Provider\Lorem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // menjalankan seeders di terminal:
    // php artisan db:seed
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Reza',
            'username' => 'rezamau',
            'email' => 'rezamau@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        Category::create([
            'name' => 'Learn Programming',
            'slug' => 'learn-programming'
        ]);

        Post::create([
            'title' => 'Artikel 1',
            'author_id' => 1,
            'category_id' => 1,
            'slug' => 'artikel-1',
            'body' => 'Lorem ipsum dolore slamet, budi, wahyono, sarjito, uaseyeekk'
        ]);
    }
}
