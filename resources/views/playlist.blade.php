<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Playlists</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="header-section">
            <h1>Your Playlists</h1>
            <button class="create-playlist-btn">
                <i class="fas fa-plus"></i> Create New Playlist
            </button>
        </div>

        <div class="playlists-grid">
            @if(isset($playlists) && count($playlists) > 0)
                @foreach($playlists as $playlist)
                    <div class="playlist-card">
                        <div class="playlist-image">
                            <img src="{{ $playlist->cover_image ?? asset('images/default-cover.jpg') }}" alt="{{ $playlist->name }}">
                            <div class="playlist-overlay">
                                <button class="play-btn">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                        </div>
                        <div class="playlist-info">
                            <h3>{{ $playlist->name }}</h3>
                            <p>{{ count($playlist->songs) }} songs</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-playlists">
                    <i class="fas fa-music"></i>
                    <p>You haven't created any playlists yet</p>
                    <button class="create-playlist-btn">
                        Create Your First Playlist
                    </button>
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
</body>
</html>