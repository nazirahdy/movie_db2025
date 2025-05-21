<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(3, 6));
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'synopsis' => $this->faker->paragraph(rand(5, 10)),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'year' => $this->faker->year(),
            'actors' => $this->faker->name() . ', ' . $this->faker->name(),
            'cover_image' => 'https://picsum.photos/seed/' . Str::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}