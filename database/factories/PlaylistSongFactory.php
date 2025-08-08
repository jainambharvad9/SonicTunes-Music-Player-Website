<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;

class PlaylistSongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlaylistSong::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'playlist_id' => Playlist::factory(),
            'song_id' => Song::factory(),
        ];
    }
}
