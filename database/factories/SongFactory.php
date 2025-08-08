<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'artist_id' => Artist::factory(),
            'album_id' => Album::factory(),
            'genre' => fake()->word(),
            'file_path' => fake()->word(),
            'cover_image' => fake()->word(),
            'duration' => fake()->time(),
        ];
    }
}
