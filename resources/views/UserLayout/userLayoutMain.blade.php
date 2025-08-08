<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SonicTunes - Music Artist</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!--favicon-img-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico')}}">
    <!--favicon-img-->
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <style>
        .glass-header {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            font-family: 'Poppins', sans-serif;
        }

        .glass-header .nav-link {
            font-size: 1.1rem;
            /* Slightly larger */
            font-weight: 500;
            color: white;
            /* text-transform: uppercase; */
            letter-spacing: 1px;
            transition: color 0.3s ease;
        }

        .glass-header .nav-link:hover {
            color: #1db954;
            /* Spotify green on hover */
        }

        .spotify-login-btn {
            background-color: white;
            color: black;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 9999px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .spotify-login-btn:hover {
            background-color: #1db954;
            color: black;
            transform: scale(1.05);
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 6px 16px;
            border-radius: 9999px;
            color: white;
            width: 100%;
        }

        .search-box i {
            color: #1db954;
        }

        .search-box input {
            background: transparent;
            border: none;
            outline: none;
            color: white;
            width: 100%;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
    </style>

    <header class="glass-header fixed top-0 w-full z-50 shadow backdrop-blur-md bg-white/10 border-b border-white/20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-14 w-auto object-contain hover:scale-105 transition duration-300" />
            </a>

            <!-- Search Box -->
            <div class="relative mx-6 flex-1 max-w-md hidden md:flex">
                <div class="search-box w-full">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search for songs..." aria-label="Search" onkeydown="search(this)"
                        onkeyup="search(this)">
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex gap-6 items-center text-white font-semibold">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ url('/about') }}" class="nav-link">About</a>
                <a href="{{ url('/Album') }}" class="nav-link">Albums</a>
                <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                <a href="{{ url('/terms') }}" class="nav-link">T&C</a>
                <a href="{{ route('login') }}" class="spotify-login-btn ml-4">Login</a>
            </nav>
        </div>
    </header>

    @yield('content')
    <footer class="glass-footer mt-16 text-white">
        <div
            class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-6 text-sm backdrop-blur-md bg-white/5 border-t border-white/20">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mb-3" />
                <p class="text-gray-300">SonicTunes is your destination for discovering new music, artists, and
                    playlists. Feel the beat!</p>
            </div>
            <div>
                <h3 class="font-bold mb-2 text-green-400">Navigation</h3>
                <ul class="space-y-1">
                    <li><a href="{{ url('/') }}" class="hover:text-green-400">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-green-400">About</a></li>
                    <li><a href="{{ url('/Album') }}" class="hover:text-green-400">Albums</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-green-400">Contact</a></li>
                    <li><a href="{{ url('/terms') }}" class="hover:text-green-400">Terms</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-2 text-green-400">Account</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('login') }}" class="hover:text-green-400">Login</a></li>
                    <li><a href="#" class="hover:text-green-400">Register</a></li>
                    <li><a href="#" class="hover:text-green-400">Profile</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-2 text-green-400">Follow Us</h3>
                <div class="flex gap-3">
                    <a href="#" class="hover:text-green-400"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-green-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-green-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-green-400"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center py-4 bg-white/5 border-t border-white/10 text-gray-400 text-xs">
            &copy; {{ now()->year }} SonicTunes. All rights reserved.
        </div>
    </footer>

    <style>
        .glass-footer {
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js')}} "></script>
    <script src="{{ asset('js/bez.js')}}"></script>
    <script src="{{ asset('js/pace.js')}}"></script>
    <script src="{{ asset('js/index.js')}}"></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <script src="{{ asset('js/index.js') }}" defer></script>
    <script>
        // Make sure this script works globally for index and artist_song pages
        var songs = window.allSongs || []; // Fallback for safety
        var isPlaying = false;
        var currentIndex = 0;
        var currentAudio = null;

        $(document).ready(function () {
            const audio = $("#audio");
            const playbtn = $(".bg-white"); // main play button
            const timeCurrent = $(".time-current");
            const timeEnd = $(".time-end");
            const range = $("#audio-range");

            // ✅ Make globally accessible
            window.setHighlight = function (index) {
                currentIndex = index;
                currentAudio = songs[index];

                if (!currentAudio) {
                    console.error("No audio found at index", index);
                    return;
                }

                $("#song-img").attr("src", currentAudio.image_full_path);
                $("#song-name").text(currentAudio.title);
                $("#artist-name").text(currentAudio.artist.name);

                audio.attr("src", currentAudio.audio_full_path);
                audio[0].load();
                audio[0].play();
                isPlaying = true;

                playbtn.html("<i class='fa-solid fa-pause'></i>");
            };

            // ✅ Play/Pause toggle
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
            };

            window.next = function () {
                const nextIndex = (currentIndex + 1) % songs.length;
                setHighlight(nextIndex);
            };

            window.previous = function () {
                const prevIndex = (currentIndex - 1 + songs.length) % songs.length;
                setHighlight(prevIndex);
            };

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
    </script>
    <script>
        function search(txt) {
            const searchtxt = txt.value.toLowerCase();
            const probox = document.getElementsByClassName("row-song");

            for (let i = 0; i < probox.length; i++) {
                const row = probox[i];
                // const id = row.cells[0].innerText.toLowerCase();
                const song = row.getElementsByClassName("song-title")[0].innerText.toLowerCase();
                const genre = row.getElementsByClassName("genre-title")[0].innerText.toLowerCase();

                if (song.includes(searchtxt) || genre.includes(searchtxt)) {
                    row.style.display = ""; // Show row
                } else {
                    row.style.display = "none"; // Hide row
                }
            }
        }
    </script>
</body>

</html>