<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Songs</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="header-section">
            <h1>Your Favorite Songs</h1>
        </div>

        <div class="favorites-grid">
            @if(isset($favorites) && count($favorites) > 0)
                @foreach($favorites as $song)
                    <div class="song-card" data-spotify-id="{{ $song->spotify_id }}">
                        <div class="song-image">
                            <img src="{{ $song->album_image ?? asset('images/default-album.png') }}" alt="{{ $song->name }}">
                            <div class="song-overlay">
                                <button class="play-btn">
                                    <i class="fas fa-play"></i>
                                </button>
                                <button class="remove-favorite-btn" data-song-id="{{ $song->id }}">
                                    <i class="fas fa-heart-broken"></i>
                                </button>
                            </div>
                        </div>
                        <div class="song-info">
                            <h3>{{ $song->name }}</h3>
                            <p>{{ $song->artist }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-favorites">
                    <i class="fas fa-heart"></i>
                    <p>You haven't added any favorites yet</p>
                    <a href="{{ route('spotify.search') }}" class="search-songs-btn">
                        Discover Songs
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
</body>
</html>