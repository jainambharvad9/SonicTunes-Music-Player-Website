@extends("UserLayout.userLayoutMain")

@section('content')
    <style>
        .blog-img.collage-grid-6 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 columns */
            grid-template-rows: repeat(2, 1fr);
            /* 2 rows to show 4 images */
            gap: 4px;
            width: 100%;
            /* height: 120px; Adjust as needed */
            border-radius: 10px;
            overflow: hidden;
        }

        .blog-img.collage-grid-6 img {
            width: 100%;
            height: 50%;
            object-fit: cover;
            display: block;
        }



        .blog-img.single-img img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .nav-logo {
        width: 180px; /* or any size you prefer */
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .nav-logo:hover {
        transform: scale(1.05); /* Slight zoom on hover */
    }
    </style>
    <!-- MAIN CONTENT -->
    <main id="blog-one">

        <!-- CUSTOM CURSOR -->
        <div class="cursor scale"></div>
        <div class="cursor-two scale"></div>
        <!-- CUSTOM CURSOR -->


        
        <!-- PRELOADER -->
        <div id="preloader">
            <div class="p">
                <img src="{{ asset('images/headphone.png') }}" alt="headphone">
            </div>
            <div class="p">Use Headphone For Better Experience.</div>
        </div>
        <!-- PRELOADER -->



        <div id="blog-one-content">

            <!-- HEADING -->

           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
            <div class="heading">
                <span class="text">
                    ALBUMS
                </span>
            </div>

            <!-- HEADING -->


            <!-- NAVIGATION -->
            <div class="navigation">
                
                <div class="logo hover" style="top: 90px">
                    <a href="/" class="text">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="nav-logo" />
                    </a>
                </div>
            </div>
            <!-- NAVIGATION -->


            <div class="center">
                <!-- BLOG-CONTAINER -->
                <div id="blogs-container">
                    @foreach ($album as $alb)
                                <div class="blog fade-up">
                                    <!-- Album Grid Cover -->
                                    <div class="blog-img collage-grid-6">
                                        @foreach($alb->songs->take(4) as $song)
                                            <img src="{{ asset('storage/' . ($song->cover_image ?? 'images/default-album.png')) }}"
                                                alt="{{ $song->title }}">
                                        @endforeach
                                    </div>

                                    <!-- Album Info -->
                                    <div class="blog-text">
                                        <div class="blog-heading">{{ $alb->name }}</div>
                                        <div class="blog-description">
                                            {{ $alb->description ?? 'Enjoy the best collection of songs from this album.' }}
                                        </div>

                                        <!-- Song List -->
                                        {{-- <div class="song-list mt-4">
                                            @foreach ($alb->songs as $song)
                                            @php
                                            $index = collect($formattedSongs)->search(fn($s) => $s['title'] === $song->title);
                                            @endphp
                                            @if ($index !== false)
                                            <div onclick="setHighlight({{ $index }})"
                                                class="cursor-pointer mb-2 p-2 rounded hover:bg-[#1db9541a] text-white flex items-center">
                                                <i class="fa fa-play-circle text-green-500 mr-2"></i>
                                                <span>{{ $song->title }}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div> --}}
                                        <!-- Song List (Limit to 8 songs per album) -->
                                        <div class="song-list mt-4">
                                            @foreach ($alb->songs->take(8) as $song)
                                                @php
                                                    $index = collect($formattedSongs)->search(function ($s) use ($song) {
                                                        return $s['title'] === $song->title;
                                                    });
                                                @endphp
                                                @if ($index !== false)
                                                    <div onclick="setHighlight({{ $index }})"
                                                        class="cursor-pointer mb-2 p-2 rounded hover:bg-[#1db9541a] text-white flex items-center">
                                                        <i class="fa fa-play-circle text-green-500 mr-2"></i>
                                                        <span>{{ $song->title }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <!-- Footer Actions -->
                                        <div class="blog-info">
                                            <div class="blog-duration">
                                                <img src="{{ asset('images/clock.png') }}" alt="clock" />&nbsp;
                                                {{ count($alb->songs) }} Songs
                                            </div>
                                            <div class="blog-type">Album / Collection</div>
                                            <a href="javascript:void(0);" title="Play Album" onclick="playAlbum({{ $alb->id }})">
                                                <div class="blog-read-more">
                                                    <img src="{{ asset('images/play.png') }}" alt="play">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Album Created Date -->
                                    <div class="blog-date">{{ $alb->created_at->format('d M, y') }}</div>
                                </div>
                    @endforeach

                    <!-- Fixed Bottom Player -->
                    <div
                        class="fixed bottom-0 w-full bg-white/10 backdrop-blur-md text-white z-50 px-4 py-2 border-t border-white/10">
                        <div class="flex items-center justify-between w-full max-w-7xl mx-auto gap-6">
                            <!-- Song Info -->
                            <div class="flex items-center gap-4 w-[300px]">
                                <img id="song-img" src="{{ asset('images/default-album.png') }}" alt="Cover"
                                    class="w-14 h-14 rounded object-cover" />
                                <div class="overflow-hidden">
                                    <div id="song-name" class="text-sm font-semibold truncate">Tum Hi Ho</div>
                                    <div id="artist-name" class="text-xs text-gray-300 truncate">Mithoon, Arijit Singh</div>
                                </div>
                                <i class="fa-solid fa-circle-check text-green-500 text-xs"></i>
                            </div>

                            <!-- Volume Control -->
                            <div class="flex items-center gap-2 text-white mt-2">
                                <i class="fa-solid fa-volume-low"></i>
                                <input id="volume-range" type="range" min="0" max="1" step="0.01" value="1"
                                    class="w-32 h-[3px] bg-white/20 accent-white rounded appearance-none">
                                <i class="fa-solid fa-volume-high"></i>
                            </div>

                            <!-- Player Controls -->
                            <div class="flex-1 max-w-3xl flex flex-col items-center">
                                <div class="flex items-center gap-5 mb-1 text-xl">
                                    <button id="shuffle-btn" class="hover:text-green-400"><i
                                            class="fa-solid fa-shuffle"></i></button>
                                    <button onclick="previous()" class="hover:text-green-400"><i
                                            class="fa-solid fa-backward-step"></i></button>
                                    <button onclick="playPause()"
                                        class="bg-white text-black p-2 rounded-full w-10 h-10 flex items-center justify-center shadow">
                                        <i class="fa-solid fa-play"></i>
                                    </button>
                                    <button onclick="next()" class="hover:text-green-400"><i
                                            class="fa-solid fa-forward-step"></i></button>
                                    <button class="hover:text-green-400"><i class="fa-solid fa-tv"></i></button>
                                </div>

                                <!-- Seekbar -->
                                <div class="flex items-center gap-3 w-full text-xs text-gray-300">
                                    <span class="time-current w-10 text-right">0:00</span>
                                    <input id="audio-range" type="range"
                                        class="w-full h-1 bg-white/20 rounded-lg accent-white" value="0" min="0" max="100"
                                        step="0.1">
                                    <span class="time-end w-10 text-left">4:22</span>
                                </div>
                            </div>

                            <!-- Audio -->
                            <audio id="audio"></audio>
                        </div>
                    </div>
                </div>
                <!-- Player Script -->
                <script>
                    const formattedSongs = @json($formattedSongs);
                    let currentIndex = 0;
                    let isPlaying = false;
                    let isAlbumPlaying = false;
                    let currentAlbum = null;
                    const audio = document.getElementById("audio");

                    function setHighlight(index) {
                        currentIndex = index;
                        isAlbumPlaying = false;
                        playSong(index);
                    }

                    function playAlbum(albumId) {
                        let albumSongs = formattedSongs.filter(song => song.album_id === albumId);
                        if (albumSongs.length === 0) return;
                        currentAlbum = albumSongs;
                        currentIndex = 0;
                        isAlbumPlaying = true;
                        playSongByData(currentAlbum[currentIndex]);
                    }

                    function playSong(index) {
                        let song = formattedSongs[index];
                        if (!song) return;
                        playSongByData(song);
                    }

                    function playSongByData(song) {
                        audio.src = song.audio_full_path;
                        document.getElementById("song-img").src = song.image_full_path || "{{ asset('images/default-album.png') }}";
                        document.getElementById("song-name").innerText = song.title;
                        document.getElementById("artist-name").innerText = song.artist.name || 'Unknown Artist';
                        audio.play();
                        isPlaying = true;
                        updatePlayButton();
                    }

                    function playPause() {
                        if (!audio.src) return;
                        if (isPlaying) {
                            audio.pause();
                        } else {
                            audio.play();
                        }
                        isPlaying = !isPlaying;
                        updatePlayButton();
                    }

                    function previous() {
                        if (isAlbumPlaying && currentAlbum) {
                            currentIndex = (currentIndex - 1 + currentAlbum.length) % currentAlbum.length;
                            playSongByData(currentAlbum[currentIndex]);
                        } else {
                            currentIndex = (currentIndex - 1 + formattedSongs.length) % formattedSongs.length;
                            playSong(currentIndex);
                        }
                    }

                    function next() {
                        if (isAlbumPlaying && currentAlbum) {
                            currentIndex = (currentIndex + 1) % currentAlbum.length;
                            playSongByData(currentAlbum[currentIndex]);
                        } else {
                            currentIndex = (currentIndex + 1) % formattedSongs.length;
                            playSong(currentIndex);
                        }
                    }

                    function updatePlayButton() {
                        const btn = document.querySelector("button[onclick='playPause()'] i");
                        if (btn) {
                            btn.className = isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-play';
                        }
                    }

                    audio.addEventListener("timeupdate", () => {
                        const current = audio.currentTime;
                        const duration = audio.duration || 0;
                        document.querySelector(".time-current").innerText = formatTime(current);
                        document.querySelector(".time-end").innerText = formatTime(duration);
                        document.getElementById("audio-range").value = (current / duration) * 100 || 0;
                    });

                    document.getElementById("audio-range").addEventListener("input", (e) => {
                        const duration = audio.duration;
                        if (!isNaN(duration)) {
                            audio.currentTime = (e.target.value / 100) * duration;
                        }
                    });

                    audio.addEventListener("ended", () => {
                        next();
                    });

                    document.getElementById("volume-range").addEventListener("input", (e) => {
                        audio.volume = e.target.value;
                    });

                    function formatTime(seconds) {
                        const mins = Math.floor(seconds / 60);
                        const secs = Math.floor(seconds % 60);
                        return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
                    }
                </script>
            </div>


            <!-- progress-bar -->
            <div class="progress-bar-container fade-in">
                <div class="progressbar"></div>
            </div>
            <!-- progress-bar -->
        </div>


    </main>
    <!-- MAIN CONTENT -->


@endsection