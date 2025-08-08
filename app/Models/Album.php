<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'artist_id',
        'release_date',
        'cover_image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'artist_id' => 'integer',
        'release_date' => 'date',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
