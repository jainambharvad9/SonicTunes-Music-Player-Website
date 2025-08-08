document.addEventListener('DOMContentLoaded', function() {
    let currentSong = null;
    let isPlaying = false;
    let currentIndex = 0;
    const songs = document.querySelectorAll('.song');
    const songsArray = Array.from(songs);

    // Filter Controls
    const albumFilter = document.getElementById('albumFilter');
    const artistFilter = document.getElementById('artistFilter');

    function filterSongs() {
        const selectedAlbum = albumFilter.value;
        const selectedArtist = artistFilter.value;

        songs.forEach(song => {
            const albumMatch = selectedAlbum === 'all' || song.dataset.album === selectedAlbum;
            const artistMatch = selectedArtist === 'all' || song.dataset.artist === selectedArtist;
            song.style.display = albumMatch && artistMatch ? 'flex' : 'none';
        });
    }

    albumFilter.addEventListener('change', filterSongs);
    artistFilter.addEventListener('change', filterSongs);

    // Playback Controls
    const prevBtn = document.getElementById('prevSong');
    const nextBtn = document.getElementById('nextSong');
    const playAllBtn = document.getElementById('playAll');
    const shuffleBtn = document.getElementById('shufflePlay');

    function playPause(audio, playBtn) {
        if (currentSong && currentSong !== audio) {
            currentSong.pause();
            currentSong.currentTime = 0;
            currentSong.parentElement.querySelector('img').src = 'images/play.png';
        }

        if (audio.paused) {
            audio.play();
            playBtn.src = 'images/pause.png';
            isPlaying = true;
        } else {
            audio.pause();
            playBtn.src = 'images/play.png';
            isPlaying = false;
        }
        currentSong = audio;
    }

    function playNext() {
        currentIndex = (currentIndex + 1) % songsArray.length;
        const nextSong = songsArray[currentIndex].querySelector('audio');
        const nextPlayBtn = songsArray[currentIndex].querySelector('.play-song img');
        playPause(nextSong, nextPlayBtn);
    }

    function playPrev() {
        currentIndex = (currentIndex - 1 + songsArray.length) % songsArray.length;
        const prevSong = songsArray[currentIndex].querySelector('audio');
        const prevPlayBtn = songsArray[currentIndex].querySelector('.play-song img');
        playPause(prevSong, prevPlayBtn);
    }

    // Event Listeners for Controls
    prevBtn.addEventListener('click', playPrev);
    nextBtn.addEventListener('click', playNext);
    playAllBtn.addEventListener('click', () => {
        if (!currentSong) {
            const firstSong = songsArray[0].querySelector('audio');
            const firstPlayBtn = songsArray[0].querySelector('.play-song img');
            playPause(firstSong, firstPlayBtn);
        } else {
            const currentPlayBtn = currentSong.parentElement.querySelector('img');
            playPause(currentSong, currentPlayBtn);
        }
    });

    shuffleBtn.addEventListener('click', () => {
        currentIndex = Math.floor(Math.random() * songsArray.length);
        const randomSong = songsArray[currentIndex].querySelector('audio');
        const randomPlayBtn = songsArray[currentIndex].querySelector('.play-song img');
        playPause(randomSong, randomPlayBtn);
    });

    // Individual Song Play Buttons
    document.querySelectorAll('.play-song').forEach((playBtn, index) => {
        playBtn.addEventListener('click', () => {
            currentIndex = index;
            const audio = playBtn.querySelector('audio');
            const playImg = playBtn.querySelector('img');
            playPause(audio, playImg);
        });
    });

    // Favorite Song Functionality
    document.querySelectorAll('.favorite-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const songId = btn.dataset.songId;
            try {
                const response = await fetch(`/api/songs/${songId}/favorite`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                if (response.ok) {
                    btn.classList.toggle('active');
                }
            } catch (error) {
                console.error('Error updating favorite status:', error);
            }
        });
    });

    // Auto-play next song when current song ends
    document.querySelectorAll('audio').forEach(audio => {
        audio.addEventListener('ended', () => {
            playNext();
        });
    });
});