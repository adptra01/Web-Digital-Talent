<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'category_id' => function ()  {
                return Category::all()->random();
            },

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            // Ambil beberapa tag secara acak dari database
            $tags = Tag::inRandomOrder()->take(rand(1, 5))->get();

            // Attach tag pada post yang baru dibuat
            $post->tags()->attach($tags);
        });
    }
}
