@extends('UserLayout.userLayoutMain')
<style>
    body {
        background: url(../images/bg-image-three.jpg);
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
@section("content")

    <main class="text-white min-h-screen py-4" id="songs-one">

        <div class="cursor scale"></div>
        <div class="cursor-two scale"></div>
        <!-- NAVIGATION -->
        <div class="navigation">
            <div class="logo hover">
                <a href="index-two.html" class="text">SonicTunes</a>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('spotify.search') }}" method="GET"
                    class="flex bg-[#121212] rounded-full px-4 py-2 items-center w-[300px]">
                    <i class="fas fa-search text-gray-400 mr-2"></i>
                    <input txype="text" name="track" class="bg-transparent outline-none text-white w-full"
                        placeholder="Search for songs..." required>
                    <button type="submit"
                        class="bg-[#1DB954] text-black px-3 py-1 rounded-full ml-2 hover:bg-[#1ed760] transition">Search</button>
                </form>
                <a href="{{ route('login') }}"
                    class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded">Sign in</a>
            </div>
        </div>
        <!-- NAVIGATION -->

        <div class="scrolling-part">

        </div>




        {{-- @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif --}}



        {{-- simple way oen way --}}
        <div id="songs-one-content" class="mt-10 px-4 text-white">
            @if(isset($songs) && count($songs))
                <h2 class="text-xl font-bold mb-4">Search Results</h2>
        
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($songs as $index => $track)
                        <div onclick="setHighlight({{ $index }})"
                             class="relative bg-[#121212] rounded-lg hover:bg-[#1db9541a] transition cursor-pointer group overflow-hidden">
        
                             <div class="relative w-full aspect-square overflow-hidden rounded-md group">
                                <!-- Album Image -->
                                <img src="{{ asset($track->image_full_path ?? 'images/default-album.png') }}"
                                     alt="{{ $track->title }}"
                                     class="w-full h-full object-cover transition duration-300 group-hover:scale-105 rounded-md" />
                            
                                <!-- ✅ Button on Bottom Right -->
                                <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button class="bg-green-500 hover:bg-green-600 text-black p-3 rounded-full shadow-lg text-lg z-30">
                                        <i class="fa-solid fa-play"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Song Info -->
                            <div class="mt-2 px-2 pb-3">
                                <h3 class="text-md font-semibold truncate">{{ $track->title ?? 'Unknown Title' }}</h3>
                                <p class="text-sm text-gray-400 truncate">{{ $track->artist->name ?? 'Unknown Artist' }}</p>
                            </div>
        
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-white text-center mt-10">No tracks found.</p>
            @endif
        </div>
        

        
        <div class="fixed bottom-0 w-full bg-white/10 backdrop-blur-md text-white z-50 px-4 py-2 border-t border-white/10">
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
                        <button id="shuffle-btn" class="hover:text-green-400"><i class="fa-solid fa-shuffle"></i></button>
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
                        <input id="audio-range" type="range" class="w-full h-1 bg-white/20 rounded-lg accent-white"
                            value="0" min="0" max="100" step="0.1">
                        <span class="time-end w-10 text-left">4:22</span>
                    </div>


                </div>

                <!-- Audio -->
                <audio id="audio"></audio>
            </div>
        </div>


        <!-- MUSIC INDICATOR -->
        {{-- <div class="music-indicator">
            <span style="--i:1;" class="music-indicator-span"></span>
            <span style="--i:2;" class="music-indicator-span "></span>
            <span style="--i:3;" class="music-indicator-span "></span>
            <span style="--i:4;" class="music-indicator-span "></span>
        </div> --}}
        <!-- MUSIC INDICATOR -->




        <!-- progress-bar -->
        <div class="progress-bar-container fade-in">
            <div class="progressbar"></div>
        </div>
        <!-- progress-bar -->


        </div>
        <!-- CONTENT -->
        <div class="navigation-content">
            <div class="navigation-logo hover opacity">
                <a href="#" class="text">ARLO BROWN</a>
            </div>
            <ul class="navigation-ul">
                <li><a href="/" data-text="Home" data-img="{{ asset('images/bg-image-three.jpg')}}">Home</a></li>
                <li><a href="/about" data-text="About" data-img="{{ asset('images/about-img.jpg')}}">About</a></li>
                <li><a href="/songs" data-text="Songs" data-img="{{ asset('images/album-thumbnail-nine.jpg')}}">Songs</a>
                </li>
                <li><a href="/blog" data-text="Blogs" data-img="{{ asset('images/main-bg-three.jpg')}}">Blogs</a></li>
                <li><a href="/contact" data-text="Contact"
                        data-img="{{ asset('images/album-thumbnail-four.jpg')}}">Contact</a>
                </li>
            </ul>
            <div class="navigation-close hover about-close opacity">
                <div class="navigation-close-line"></div>
                <div class="navigation-close-line"></div>
            </div>

            <div class="project-preview"></div>
            <!-- HEADPHONE IMG -->
            <div class="headphone-navigation opacity">
                <img src="{{ asset('images/headphone.png')}}" title="headphone zone" class="text" alt="headphone">
            </div>
            <!-- HEADPHONE IMG -->


            <!-- SOCIAL MEDIA LINKS -->
            <div class="social-media-links-navigation">
                <ul>
                    <li><a href="#" class="text hover opacity">YT</a></li>
                    <li><a href="#" class="text hover opacity">FB</a></li>
                    <li><a href="#" class="text hover opacity">IG</a></li>
                </ul>
            </div>
            <!-- SOCIAL MEDIA LINKS -->
        </div>
        <!-- NAVIGATION CONTENT -->

        
    </main>
@endsection