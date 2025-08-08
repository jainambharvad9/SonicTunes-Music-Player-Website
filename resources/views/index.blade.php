@extends("UserLayout.userLayoutMain")

@section("content")
    <script>
        window.allSongs = @json($formattedSongs);
    </script>
    <style>
        body {
            background: url('../images/bg-image-three.jpg') no-repeat center center fixed;
            background-size: cover;
            color: rgb(240, 240, 240);
            font-family: 'Josefin Sans', sans-serif;
        }
        main {
        min-height: 100vh; /* ensures main takes full height */
        padding-bottom: 6200px; /* adjust to match your footer height */
    }
        .nav-logo {
            width: 70px;
            /* or any size you prefer */
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .nav-logo:hover {
            transform: scale(1.05);
            /* Slight zoom on hover */
        }

        .search-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 10px 20px;
            /* space below header */
        }


    </style>

    <!-- MAIN CONTENT -->
    <main id="index-one" class=" mt-5">

        <!-- CUSTOM CURSOR -->
        <div class="cursor scale"></div>
        <div class="cursor-two scale"></div>
        <!-- CUSTOM CURSOR -->

        {{-- <!-- PRELOADER -->
        <div id="preloader">
            <div class="p">
                <img src="images/headphone.png" alt="headphone">
                Use Headphone For Better Experience
            </div>
        </div>
        <!-- PRELOADER -->
        --}}

        <!-- HEADER -->
        <div id="header">
            <div class="row">
                <div class="col-md-9">
                    <!-- NAVIGATION -->
                    <div class="navigation">
                        <div class="logo hover" style="top: 30px">
                            {{-- <a href="/" class="text"> --}}
                                {{-- </a> --}}
                        </div>

                        <div class="flex justify-content-center align-items-center items-center gap-4">
                            <div class="search-section">

                            </div>

                        </div>

                    </div>
                    <!-- NAVIGATION -->

                    <!-- HEADPHONE IMG -->
                    <div class="headphone img text">
                        <img src="images/headphone.png" class="text" alt="headphone">
                    </div>
                    <!-- HEADPHONE IMG -->

                    <!-- GENRES -->
                    @foreach($groupedSongs as $genre => $songs)
                                <div class="mb-10 px-4 ">
                                    <h2 class="text-white text-2xl font-bold mb-4">{{ $genre }}</h2>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                                        @foreach($songs as $track)
                                                            @php
                                                                $indexInFormatted = collect($formattedSongs)->search(fn($s) => $s['title'] === $track['title']);
                                                            @endphp
                                                            <div onclick="setHighlight({{ $indexInFormatted }})"
                                                                class="relative bg-[#121212] row-song rounded-lg hover:bg-[#1db9541a] transition cursor-pointer group overflow-hidden">
                                                                <div class="relative w-full aspect-square overflow-hidden rounded-md group">
                                                                    <img src="{{ asset('storage/' . $track->cover_image ?? 'images/default-album.png') }}"
                                                                        alt="{{ $track->title }}"
                                                                        class="w-full h-full object-cover transition duration-300 group-hover:scale-105 rounded-md" />
                                                                    <div
                                                                        class="absolute bottom-3 right-3 z-30 group-hover:opacity-100 transition duration-300">
                                                                        <button class="spt-btn"><i class="fa-solid fa-play"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 px-2 pb-3">
                                                                    <h3 class="text-md font-semibold truncate song-title">
                                                                        {{ $track->title ?? 'Unknown Title' }}
                                                                    </h3>
                                                                    <p class="text-sm text-gray-400 truncate genre-title">
                                                                        {{ $track->genre ?? 'Unknown Genre' }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div id="index-one">
                        <div style="margin-bottom: 100px" class="new-release img text">
                            <!-- ARTISTS -->
                            <h2 class="text-2xl font-bold my-4 text-white text-center">Your Artists</h2>
                            <section class="px-4">
                                <div class="flex flex-col gap-4">
                                    @foreach($ar as $a)
                                        <a href="{{ route('artist.song', $a->id) }}">
                                            <div
                                                class="w-full bg-[#121212] p-3 rounded-lg hover:bg-[#1db9541a] transition text-center">
                                                <img src="{{ asset($a->image) }}" alt="artist image"
                                                    class="w-24 h-24 object-cover rounded-full mx-auto mb-2">
                                                <h3 class="text-base font-medium text-white truncate">{{ $a->name }}</h3>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="flex items-center gap-2 text-white mt-2">
                        <i class="fa-solid fa-volume-low"></i>
                        <input id="volume-range" type="range" min="0" max="1" step="0.01" value="1"
                            class="w-32 h-[3px] bg-white/20 accent-white rounded appearance-none">
                        <i class="fa-solid fa-volume-high"></i>
                    </div>
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
                        <div class="flex items-center gap-3 w-full text-xs text-gray-300">
                            <span class="time-current w-10 text-right">0:00</span>
                            <input id="audio-range" type="range" class="w-full h-1 bg-white/20 rounded-lg accent-white"
                                value="0" min="0" max="100" step="0.1">
                            <span class="time-end w-10 text-left">4:22</span>
                        </div>
                    </div>
                    <audio id="audio"></audio>
                </div>
            </div>
        </div>
        <!-- NEW RELEASE -->
        <div class="scrolling-part">

        </div>
        <!-- HEADER -->
    </main>


@endsection