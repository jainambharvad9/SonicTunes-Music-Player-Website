<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'artist_id',
        'album_id',
        'genre',
        'song_file',
        'cover_image',
        'duration',
    ];

    protected $appends = ["image_full_path","audio_full_path"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'artist_id' => 'integer',
        'album_id' => 'integer',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function getImageFullPathAttribute(){
        return asset('storage/'.$this->cover_image);
    }

    public function getAudioFullPathAttribute(){
        return asset('storage/'.$this->song_file);
    }
}
