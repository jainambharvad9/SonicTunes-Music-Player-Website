@extends('UserLayout.userLayoutMain')
<script>
    window.allSongs = @json($songs);
</script>
<style>
    .nav-logo {
        width: 80px;
        /* or any size you prefer */
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .nav-logo:hover {
        transform: scale(1.05);
        /* Slight zoom on hover */
    }
</style>
@section('content')
    <!-- MAIN CONTENT -->
    <main id="about-one">
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


            <br>
            <br>

            <div class="scrolling-part">

            </div>


            <div class="heading">
                <span class="text">{{ $artist->name }}</span>
            </div>
            <div class="center">
                <div class="about-img img">
                    <img class="img-parallax" src="{{ asset($artist->image) }}" alt="artist image">
                </div>
            </div>
            <div class="center">
                <div class="about-text">
                    <div class="about-text-heading text-scroll">
                        Hi there, I’m glad you found me. My name is <span class="red">{{ $artist->name }}</span> and I like
                        to make music.
                    </div>

                    <!-- SONGS LIST -->
                    <div class="mt-10 px-4 text-white">
                        <h2 class="text-xl font-bold mb-4">Songs by {{ $artist->name }}</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($songs as $index => $song)
                                <div class="bg-[#121212] p-4 rounded-lg hover:bg-[#1db9541a] transition cursor-pointer"
                                    onclick="setHighlight({{ $index }})">
                                    <img src="{{ $song['image_full_path'] }}" alt="{{ $song['title'] }}"
                                        class="w-full h-40 object-cover rounded-md mb-2">
                                    <h3 class="text-lg font-semibold">{{ $song['title'] }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="about-text-content text-scroll">
                        {{ $artist->bio ?? 'No bio available.' }}
                    </div>
                </div>
            </div>

            <!-- PLAYER -->
            <div
                class="fixed bottom-0 w-full bg-white/10 backdrop-blur-md text-white z-50 px-4 py-2 border-t border-white/10">
                <div class="flex items-center justify-between w-full max-w-7xl mx-auto gap-6">
                    <div class="flex items-center gap-4 w-[300px]">
                        <img id="song-img" src="{{ asset('images/default-album.png') }}" alt="Cover"
                            class="w-14 h-14 rounded object-cover" />
                        <div class="overflow-hidden">
                            <div id="song-name" class="text-sm font-semibold truncate">Song Title</div>
                            <div id="artist-name" class="text-xs text-gray-300 truncate">Artist</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white mt-2">
                        <i class="fa-solid fa-volume-low"></i>
                        <input id="volume-range" type="range" min="0" max="1" step="0.01" value="1"
                            class="w-32 h-[3px] bg-white/20 accent-white rounded appearance-none">
                        <i class="fa-solid fa-volume-high"></i>
                    </div>
                    <div class="flex-1 max-w-3xl flex flex-col items-center">
                        <div class="flex items-center gap-5 mb-1 text-xl">
                            <button onclick="previous()" class="hover:text-green-400"><i
                                    class="fa-solid fa-backward-step"></i></button>
                            <button onclick="playPause()"
                                class="play-btn bg-white text-black p-2 rounded-full w-10 h-10 flex items-center justify-center shadow">
                                <i class="fa-solid fa-play"></i>
                            </button>
                            <button onclick="next()" class="hover:text-green-400"><i
                                    class="fa-solid fa-forward-step"></i></button>
                        </div>
                        <div class="flex items-center gap-3 w-full text-xs text-gray-300">
                            <span class="time-current w-10 text-right">0:00</span>
                            <input id="audio-range" type="range" class="w-full h-1 bg-white/20 rounded-lg accent-white"
                                value="0" min="0" max="100" step="0.1">
                            <span class="time-end w-10 text-left">0:00</span>
                        </div>
                    </div>
                    <audio id="audio"></audio>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN CONTENT -->


    {{--
    <script>
        var songs = @json($songs);
        var audio = $("#audio");
        var isPlaying = null;
        var currentIndex = 0;
        var currentAudio = null;
        var playbtn = $(".play-btn");
        var timeCurrent = $(".time-current");
        var timeEnd = $(".time-end");
        var range = $("#audio-range");
        console.log(songs);
        // setHighlight(0);
        function setHighlight(index) {
            currentIndex = index;
            currentAudio = songs[index];

            $("#song-img").prop("src", currentAudio.image_full_path);
            $("#song-name").html(currentAudio.title);
            $("#artist-name").html(currentAudio?.artist?.name);


            audio.prop('src', currentAudio?.audio_full_path);
            audio[0].play();
            audio[0].currentTime = 100;
            playbtn.html("<i class='fa-solid fa-play'></i>")
            // $("body").css("background-image", `url(${currentAudio.image_full_path})`);
            // $("body").css("background-size", "cover");
            // $("body").css("background-position", "center");
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

        volumeRange.addEventListener("input", () => {
            audio[0].volume = volumeRange.value;
        });
    </script> --}}
    <!-- JS PLAYER SCRIPT -->
    {{--
    <script>
        var songs = @json($songs);
        var isPlaying = false;
        var currentIndex = 0;
        var currentAudio = null;

        // Declare audio and UI elements inside document ready
        $(document).ready(function () {
            const audio = $("#audio");
            const playbtn = $(".bg-white");
            const timeCurrent = $(".time-current");
            const timeEnd = $(".time-end");
            const range = $("#audio-range");

            // 🔁 Make setHighlight global only after elements exist
            window.setHighlight = function (index) {
                currentIndex = index;
                currentAudio = songs[index];

                // Update UI
                $("#song-img").attr("src", currentAudio.image_full_path);
                $("#song-name").text(currentAudio.title);
                $("#artist-name").text(currentAudio.artist.name);

                // Play audio
                audio.attr("src", currentAudio.audio_full_path);
                audio[0].load();
                audio[0].play();
                isPlaying = true;

                playbtn.html("<i class='fa-solid fa-pause'></i>");
            }

            window.playPause = function () {
                if (audio[0].paused) {
                    audio[0].play();
                    isPlaying = true;
                    playbtn.html("<i class='fa-solid fa-pause'></i>");
                } else {
                    audio[0].pause();
                    isPlaying = false;
                    playbtn.html("<i class='fa-solid fa-play'></i>");
                }
            }

            window.previous = function () {
                const newIndex = currentIndex > 0 ? currentIndex - 1 : songs.length - 1;
                setHighlight(newIndex);
            }

            window.next = function () {
                const newIndex = currentIndex < songs.length - 1 ? currentIndex + 1 : 0;
                setHighlight(newIndex);
            }

            function formatTime(seconds) {
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            audio.on("timeupdate", function () {
                const current = audio[0].currentTime;
                const duration = audio[0].duration || 0;
                range.val((current / duration) * 100 || 0);
                timeCurrent.text(formatTime(current));
                timeEnd.text(formatTime(duration));
            });

            range.on("input", function () {
                const duration = audio[0].duration;
                if (!isNaN(duration)) {
                    audio[0].currentTime = (range.val() / 100) * duration;
                }
            });

            audio.on("ended", function () {
                next();
            });

            $("#volume-range").on("input", function () {
                audio[0].volume = $(this).val();
            });
        });
    </script> --}}




@endsection