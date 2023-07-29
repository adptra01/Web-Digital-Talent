<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageUrl = 'https://source.unsplash.com/random/700x500/?write,academic';
        // Ambil konten gambar dari URL
        $imageContents = file_get_contents($imageUrl);

        // Buat nama file thumbnail acak
        $filename = 'thumbnail_' . uniqid() . '.jpg';

        // Simpan gambar ke dalam folder "thumbnail"
        Storage::disk('public')->put('thumbnail/' . $filename, $imageContents);

        // Kembalikan URL lengkap dari gambar thumbnail yang disimpan
        $thumbnail = 'thumbnail/' . $filename;


        return [
            'title' => $this->faker->sentence(2),
            'category_id' => function ()  {
                return Category::all()->random();
            },
            'thumbnail' => $thumbnail,
            'content' => '<p>'.$this->faker->paragraph().'</p>',
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
