@extends('UserLayout.userLayoutMain')

@section('content')
<style>
    body {
        background: url(../images/bg-image-three.jpg);
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
    }
    .nav-logo {
        width: 80px; /* or any size you prefer */
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .nav-logo:hover {
        transform: scale(1.05); /* Slight zoom on hover */
    }
</style>
<main class="text-white min-h-screen py-4">

    <!-- CUSTOM CURSOR -->
    <div class="cursor scale"></div>
    <div class="cursor-two scale"></div>
    <!-- CUSTOM CURSOR -->

    <div id="preloader">
        <div class="p">
            <img src="{{ asset('images/headphone.png') }}" alt="headphone">
        </div>
        <div class="p">Use Headphone For Better Experience.</div>
    </div>

    <div id="about-one-content">
        <!-- NAVIGATION -->
        <div class="navigation">
            <div class="logo hover" style="top: 90px">
                <a href="/" class="text">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="nav-logo" />
                </a>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('spotify.search') }}" method="GET" class="flex bg-[#121212] rounded-full px-4 py-2 items-center w-[300px]">
                    <i class="fas fa-search text-gray-400 mr-2"></i>
                    <input type="text" name="track" class="bg-transparent outline-none text-white w-full" placeholder="Search for songs..." required>
                    <button type="submit" class="bg-[#1DB954] text-black px-3 py-1 rounded-full ml-2 hover:bg-[#1ed760] transition">Search</button>
                </form>
                <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded">Sign in</a>
            </div>
        </div>
        <!-- NAVIGATION -->

        <div class="scrolling-part">

        </div>
        <!-- PLAYLISTS -->
        @if(isset($songsByPlaylist) && count($songsByPlaylist))
            @foreach($songsByPlaylist as $playlist => $songs)
                <section class="mb-8 px-6 py-4">
                    <h2 class="text-xl font-bold mb-4">{{ $playlist }}</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach($songs as $song)
                            <div class="bg-[#121212] p-3 rounded-lg hover:bg-[#1db9541a] transition">
                                @if($song->cover_image)
                                    <img src="{{ asset('storage/' . $song->cover_image) }}" alt="song image" class="w-full h-40 object-cover rounded mb-2">
                                @else
                                    <div class="w-full h-40 bg-gray-700 flex items-center justify-center text-white rounded mb-2">No Image</div>
                                @endif
                                <div class="font-semibold">{{ $song->title ?? 'No Name' }}</div>
                                <div class="text-sm text-gray-400">{{ $song->artist->name ?? 'Unknown Artist' }}</div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @endif

        <!-- GENRES -->
        @foreach($groupedSongs as $genre => $songs)
            <div class="mb-10 px-4">
                <h2 class="text-white text-2xl font-bold mb-4">{{ $genre }}</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($songs as $index => $track)
                        <div onclick="setHighlight({{ $index }})" class="relative bg-[#121212] rounded-lg hover:bg-[#1db9541a] transition cursor-pointer group overflow-hidden">
                            <div class="relative w-full aspect-square overflow-hidden rounded-md group">
                                <img src="{{ asset('storage/' . $track->cover_image ?? 'images/default-album.png') }}" alt="{{ $track->title }}" class="w-full h-full object-cover transition duration-300 group-hover:scale-105 rounded-md" />
                                <div class="absolute bottom-3 right-3 z-30 opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button class="bg-green-500 hover:bg-green-600 text-black p-3 rounded-full shadow-lg text-lg">
                                        <i class="fa-solid fa-play"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2 px-2 pb-3">
                                <h3 class="text-md font-semibold truncate">{{ $track->title ?? 'Unknown Title' }}</h3>
                                <p class="text-sm text-gray-400 truncate">{{ $track->genre ?? 'Unknown Genre' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- ARTISTS -->
        <h2 class="text-2xl font-bold my-6 px-6">Your Artists</h2>
        <section class="mb-6 px-6 py-4">
            <div class="flex flex-wrap gap-6">
                @foreach($ar as $a)
                    <a href="{{ route('artist.song', $a->id) }}">
                        <div class="w-[160px] bg-[#121212] p-3 rounded-lg hover:bg-[#1db9541a] transition text-center">
                            <img src="{{ asset($a->image) }}" alt="artist image" class="w-32 h-32 object-cover rounded-full mx-auto mb-2">
                            <h3 class="text-xl font-semibold">{{ $a->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- ALBUMS -->
        @if(isset($songsByAlbum) && count($songsByAlbum))
            <h2 class="text-2xl font-bold my-6 px-6">Albums</h2>
            @foreach($songsByAlbum as $album => $songs)
                <section class="mb-8 px-6 py-4 ">
                    <h3 class="text-xl font-semibold mb-3">{{ optional($song->album)->name }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach($songs as $song)
                            <div class="bg-[#121212] p-3 rounded-lg hover:bg-[#1db9541a] transition">
                                <img src="{{ asset('storage/' . $song->cover_image) }}" alt="song image" class="w-full h-40 object-cover rounded mb-2">
                                <div class="font-semibold">{{ $song->title }}</div>
                                <div class="text-sm text-gray-400">{{ $song->artist->name }}</div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @endif

        <!-- PLAYER CONTROLS -->
        <div class="fixed bottom-0 w-full bg-white/10 backdrop-blur-md text-white z-50 px-4 py-2 border-t border-white/10">
            <div class="flex items-center justify-between w-full max-w-7xl mx-auto gap-6">
                <!-- Song Info -->
                <div class="flex items-center gap-4 w-[300px]">
                    <img id="song-img" src="{{ asset('images/default-album.png') }}" alt="Cover" class="w-14 h-14 rounded object-cover" />
                    <div class="overflow-hidden">
                        <div id="song-name" class="text-sm font-semibold truncate">Tum Hi Ho</div>
                        <div id="artist-name" class="text-xs text-gray-300 truncate">Mithoon, Arijit Singh</div>
                    </div>
                    <i class="fa-solid fa-circle-check text-green-500 text-xs"></i>
                </div>
                <div class="flex items-center gap-2 text-white mt-2">
                    <i class="fa-solid fa-volume-low"></i>
                    <input id="volume-range" type="range" min="0" max="1" step="0.01" value="1" class="w-32 h-[3px] bg-white/20 accent-white rounded appearance-none">
                    <i class="fa-solid fa-volume-high"></i>
                </div>
                <div class="flex-1 max-w-3xl flex flex-col items-center">
                    <div class="flex items-center gap-5 mb-1 text-xl">
                        <button id="shuffle-btn" class="hover:text-green-400"><i class="fa-solid fa-shuffle"></i></button>
                        <button onclick="previous()" class="hover:text-green-400"><i class="fa-solid fa-backward-step"></i></button>
                        <button onclick="playPause()" class="bg-white text-black p-2 rounded-full w-10 h-10 flex items-center justify-center shadow">
                            <i class="fa-solid fa-play"></i>
                        </button>
                        <button onclick="next()" class="hover:text-green-400"><i class="fa-solid fa-forward-step"></i></button>
                        <button class="hover:text-green-400"><i class="fa-solid fa-tv"></i></button>
                    </div>
                    <div class="flex items-center gap-3 w-full text-xs text-gray-300">
                        <span class="time-current w-10 text-right">0:00</span>
                        <input id="audio-range" type="range" class="w-full h-1 bg-white/20 rounded-lg accent-white" value="0" min="0" max="100" step="0.1">
                        <span class="time-end w-10 text-left">4:22</span>
                    </div>
                </div>
                <audio id="audio"></audio>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function () {
    var songs = @json($songs);
    var audio = $("#audio");
    var isPlaying = null;
    var currentIndex = 0;
    var currentAudio = null;
    var playbtn = $(".play-btn");
    var timeCurrent = $(".time-current");
    var timeEnd = $(".time-end");
    var range = $("#audio-range");

    function setHighlight(index) {
        currentIndex = index;
        currentAudio = songs[index];

        $("#song-img").prop("src", currentAudio.image_full_path);
        $("#song-name").html(currentAudio.title);
        $("#artist-name").html(currentAudio?.artist?.name);

        audio.prop('src', currentAudio.audio_full_path);
        audio[0].load();
        audio[0].currentTime = 0;
        audio[0].play();

        playbtn.html("<i class='fa-solid fa-play'></i>");
        isPlaying = true;
    }

        function playPause() {
            if (audio[0].paused) {
                audio[0].play();
                isPlaying = true;
                // playbtn.html("<i class='fa-solid fa-play'></i>")
    
            } else {
                audio[0].pause();
                isPlaying = false;
                // playbtn.html("<i class='fa-solid fa-pause'></i>")
    
            }
        }
        audio[0].addEventListener("play", function () {
            // console.log("Audio started playing");
            playbtn.html("<i class='fa-solid fa-pause'></i>")
    
        });
    
        audio[0].addEventListener("pause", function () {
            // console.log("Audio is paused");
            playbtn.html("<i class='fa-solid fa-play'></i>")
    
        });
    
        audio[0].addEventListener("ended", function () {
            console.log("Audio playback ended");
        });
    
    
        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
        }
    
        audio[0].addEventListener("timeupdate", function () {
            // console.log("Current time:", audio[0].currentTime);
            const current = audio[0].currentTime;
            const duration = audio[0].duration || 0;
            range.val((current / duration) * 100 || 0);
            timeCurrent.html(`${formatTime(current)}`);
            timeEnd.html(`${formatTime(duration)}`);
        });
    
        range[0].addEventListener('input', () => {
            const duration = audio[0].duration;
            console.log(duration, range.val(), (range.val() / 100) * duration);
            if (!isNaN(duration)) {
                const seekTime = (range.val() / 100) * duration;
                audio[0].currentTime = seekTime;
            }
        });
        function previous() {
            if (currentIndex != 0) {
                setHighlight(currentIndex - 1);
            }
            else {
                setHighlight(songs.length - 1);
            }
        }
    
        function next() {
    
            if (currentIndex != (songs.length - 1)) {
                setHighlight(currentIndex + 1);
            }
            else {
                setHighlight(0);
            }
        }
        const volumeRange = document.getElementById("volume-range");
    
        $("#volume-range").on("input", function () {
        audio[0].volume = $(this).val();
    });
});
    </script> --}}
    <script>
        $(document).ready(function () {
    var songs = @json($songs);
    var audio = $("#audio")[0]; // Ensure audio is a DOM element, not jQuery object
    var isPlaying = false;
    var currentIndex = 0;

    // Function to highlight and play the selected song
    function setHighlight(index) {
        currentIndex = index;
        var currentAudio = songs[index];

        $("#song-img").prop("src", currentAudio.image_full_path);
        $("#song-name").html(currentAudio.title);
        $("#artist-name").html(currentAudio.artist.name);

        // If the song is different, pause and reset the player
        if (audio.src !== currentAudio.audio_full_path) {
            audio.src = currentAudio.audio_full_path;
            audio.load();
            audio.play();
            isPlaying = true;
        } else if (audio.paused) {
            audio.play();
            isPlaying = true;
        } else {
            audio.pause();
            isPlaying = false;
        }
    }

    // Play or pause the current song
    function playPause() {
        if (audio.paused) {
            audio.play();
            isPlaying = true;
        } else {
            audio.pause();
            isPlaying = false;
        }
    }

    // Play previous song
    function previous() {
        if (currentIndex !== 0) {
            setHighlight(currentIndex - 1);
        } else {
            setHighlight(songs.length - 1);
        }
    }

    // Play next song
    function next() {
        if (currentIndex !== songs.length - 1) {
            setHighlight(currentIndex + 1);
        } else {
            setHighlight(0);
        }
    }

    // Update song progress
    audio.addEventListener("timeupdate", function () {
        const currentTime = audio.currentTime;
        const duration = audio.duration || 0;
        const range = $("#audio-range");
        range.val((currentTime / duration) * 100 || 0);
        $(".time-current").html(formatTime(currentTime));
        $(".time-end").html(formatTime(duration));
    });

    // Format time for audio playback
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
    }

    // Volume control
    $("#volume-range").on("input", function () {
        audio.volume = $(this).val();
    });

    // Song selection on card click
    $(".song-card").on("click", function () {
        const index = $(this).data("index");
        setHighlight(index);
    });

    // Event listeners for audio play/pause
    audio.addEventListener("play", function () {
        $(".play-btn").html("<i class='fa-solid fa-pause'></i>");
        isPlaying = true;
    });

    audio.addEventListener("pause", function () {
        $(".play-btn").html("<i class='fa-solid fa-play'></i>");
        isPlaying = false;
    });

    // Event listener for song end
    audio.addEventListener("ended", function () {
        next();
    });

    // Set up previous, next, and play/pause buttons
    $(".play-btn").on("click", playPause);
    $(".prev-btn").on("click", previous);
    $(".next-btn").on("click", next);
});

    </script>

</main>
@endsection
