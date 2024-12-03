<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Blog::class;
    public function definition(): array
    {
        $title = $this->faker->text(20);
        return [
            'title' => $title,
            'description' => $this->faker->realText(),
            'slug' => Str::slug($title)
        ];
    }
}
