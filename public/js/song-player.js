document.addEventListener('DOMContentLoaded', function() {
    const audioElements = document.querySelectorAll('audio');
    const playButtons = document.querySelectorAll('.play-song img');
    let currentlyPlaying = null;

    function updateProgress(audio, progressBar) {
        const progress = (audio.currentTime / audio.duration) * 100;
        progressBar.style.width = `${progress}%`;
    }

    function resetProgress(progressBar) {
        progressBar.style.width = '0%';
    }

    function togglePlay(audio, playButton, progressElement) {
        if (currentlyPlaying && currentlyPlaying !== audio) {
            currentlyPlaying.pause();
            const oldPlayButton = document.querySelector(`[data-song="${currentlyPlaying.dataset.audio}"]`);
            oldPlayButton.src = oldPlayButton.src.includes('pause') ? oldPlayButton.src.replace('pause', 'play') : oldPlayButton.src;
            resetProgress(currentlyPlaying.closest('.song').querySelector('.progress'));
        }

        if (audio.paused) {
            audio.play();
            playButton.src = playButton.src.includes('play') ? playButton.src.replace('play', 'pause') : playButton.src;
            currentlyPlaying = audio;
        } else {
            audio.pause();
            playButton.src = playButton.src.includes('pause') ? playButton.src.replace('pause', 'play') : playButton.src;
            currentlyPlaying = null;
        }
    }

    audioElements.forEach(audio => {
        const song = audio.closest('.song');
        const playButton = song.querySelector('.play-song img');
        const progressElement = song.querySelector('.progress');

        audio.addEventListener('timeupdate', () => {
            updateProgress(audio, progressElement);
        });

        audio.addEventListener('ended', () => {
            playButton.src = playButton.src.includes('pause') ? playButton.src.replace('pause', 'play') : playButton.src;
            resetProgress(progressElement);
            currentlyPlaying = null;
        });

        playButton.addEventListener('click', () => {
            togglePlay(audio, playButton, progressElement);
        });
    });

    // Handle global player controls
    const prevButton = document.getElementById('prevSong');
    const nextButton = document.getElementById('nextSong');
    const playAllButton = document.getElementById('playAll');
    const shuffleButton = document.getElementById('shufflePlay');

    function getPlayableSongs() {
        return Array.from(document.querySelectorAll('.song:not([style*="display: none"])'));
    }

    function getCurrentSongIndex() {
        const songs = getPlayableSongs();
        return songs.findIndex(song => song.contains(currentlyPlaying));
    }

    function playSelectedSong(song) {
        const audio = song.querySelector('audio');
        const playButton = song.querySelector('.play-song img');
        togglePlay(audio, playButton);
    }

    prevButton.addEventListener('click', () => {
        const songs = getPlayableSongs();
        let currentIndex = getCurrentSongIndex();
        if (currentIndex === -1) currentIndex = 0;
        const prevIndex = (currentIndex - 1 + songs.length) % songs.length;
        playSelectedSong(songs[prevIndex]);
    });

    nextButton.addEventListener('click', () => {
        const songs = getPlayableSongs();
        let currentIndex = getCurrentSongIndex();
        if (currentIndex === -1) currentIndex = -1;
        const nextIndex = (currentIndex + 1) % songs.length;
        playSelectedSong(songs[nextIndex]);
    });

    playAllButton.addEventListener('click', () => {
        const songs = getPlayableSongs();
        if (songs.length > 0) {
            playSelectedSong(songs[0]);
        }
    });

    shuffleButton.addEventListener('click', () => {
        const songs = getPlayableSongs();
        if (songs.length > 0) {
            const randomIndex = Math.floor(Math.random() * songs.length);
            playSelectedSong(songs[randomIndex]);
        }
    });
}));