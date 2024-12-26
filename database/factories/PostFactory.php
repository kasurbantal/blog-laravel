<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::factory(), // Menghubungkan Post dengan User melalui author_id menggunakan User::factory() untuk relasi yang realistis.
            'category_id' => Category::factory(), // Menghubungkan Post dengan Category melalui category_id menggunakan Category::factory() untuk relasi yang realistis.
            'slug'=> Str::slug(fake()->sentence()),
            'body' => fake()->text()
        ];
    }
}
