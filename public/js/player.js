window.onSpotifyWebPlaybackSDKReady = () => {
    const token = 'BQAV0T5YBU9JQRUJMT5251PELMenOu91jEvFHrIzwwXgF6htks8eRF8hRtDqkhlhecjswZr6jSx4CPLRd1ph-ox1d-gV62f8QmtTp1D1KNEBqLjnFeQVzeQeNHh8Id8_UvyJPMoCdaiRcccrXjeRIIr4MHkTmfYby3LH32ar_0HVdQCn-KKWhLeffd_PUJ0lLhJmJOw5atwYAfXcV-gSnzlomQy66UseU5fVfjI5rHnufy0fbqAPwXOvhvt1'; // Must be a user token (not client credentials)
    const player = new Spotify.Player({
        name: 'My Web Player',
        getOAuthToken: cb => { cb(token); },
        volume: 0.5
    });

    player.connect();
};


    // Error handling
    player.addListener('initialization_error', ({ message }) => { console.error(message); });
    player.addListener('authentication_error', ({ message }) => { console.error(message); });
    player.addListener('account_error', ({ message }) => { console.error(message); });
    player.addListener('playback_error', ({ message }) => { console.error(message); });

    // Playback status updates
    player.addListener('player_state_changed', state => {
        if (state) {
            updatePlayerState(state);
        }
    });

    // Ready
    player.addListener('ready', ({ device_id }) => {
        console.log('Ready with Device ID', device_id);
        // Store device ID for later use
        window.spotifyDeviceId = device_id;
    });

    // Connect to the player
    player.connect();

    // Handle track cards click
    document.querySelectorAll('.track-card').forEach(card => {
        card.addEventListener('click', async () => {
            const trackId = card.dataset.spotifyId;
            await playTrack(trackId);
        });
    });

    // Player controls
    document.getElementById('playPause').addEventListener('click', () => {
        player.togglePlay();
    });

    document.getElementById('previousTrack').addEventListener('click', () => {
        player.previousTrack();
    });

    document.getElementById('nextTrack').addEventListener('click', () => {
        player.nextTrack();
    });
};

function updatePlayerState(state) {
    // Update play/pause button
    const playPauseButton = document.getElementById('playPause');
    playPauseButton.innerHTML = state.paused ? '<i class="fas fa-play"></i>' : '<i class="fas fa-pause"></i>';

    // Update progress bar
    const progress = (state.position / state.duration) * 100;
    document.getElementById('trackProgress').style.width = `${progress}%`;

    // Update time displays
    document.getElementById('currentTime').textContent = formatTime(state.position);
    document.getElementById('duration').textContent = formatTime(state.duration);
}

function formatTime(ms) {
    const minutes = Math.floor(ms / 60000);
    const seconds = ((ms % 60000) / 1000).toFixed(0);
    return `${minutes}:${seconds.padStart(2, '0')}`;
}

async function playTrack(trackId) {
    try {
        await fetch(`/api/play-track`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                track_id: trackId,
                device_id: window.spotifyDeviceId
            })
        });
    } catch (error) {
        console.error('Error playing track:', error);
    }
}
let player;
window.onSpotifyWebPlaybackSDKReady = () => {
    const token = document.getElementById('spotify-token').value;
    
    player = new Spotify.Player({
        name: 'Web Playback SDK',
        getOAuthToken: cb => { cb(token); },
        volume: 0.5
    });

    // Error handling
    player.addListener('initialization_error', ({ message }) => {
        console.error('Failed to initialize', message);
    });

    player.addListener('account_error', ({ message }) => {
        console.error('Failed to validate Spotify account', message);
    });

    player.addListener('playback_error', ({ message }) => {
        console.error('Failed to perform playback', message);
    });

    // Playback status updates
    player.addListener('player_state_changed', state => {
        if (state) {
            updatePlayerState(state);
        }
    });

    // Ready
    player.addListener('ready', ({ device_id }) => {
        console.log('Ready with Device ID', device_id);
        window.spotifyDeviceId = device_id;
    });

    player.connect().then(success => {
        if (success) {
            console.log('The Web Playback SDK successfully connected to Spotify!');
        }
    });
};

// Add this to your existing click handler for track cards
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.track-card').forEach(card => {
        card.addEventListener('click', async (e) => {
            e.preventDefault();
            const trackId = card.dataset.spotifyId;
            
            try {
                const response = await fetch('/api/play-track', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        track_id: trackId,
                        device_id: window.spotifyDeviceId
                    })
                });

                if (!response.ok) {
                    throw new Error('Failed to play track');
                }

                // Update UI to show playing state
                document.querySelectorAll('.track-card').forEach(c => {
                    c.classList.remove('playing');
                });
                card.classList.add('playing');

            } catch (error) {
                console.error('Error playing track:', error);
                alert('Failed to play track. Please try again.');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var iframe = document.querySelector('#soundcloudPlayer');
    var widget = SC.Widget(iframe);

    widget.bind(SC.Widget.Events.PLAY_PROGRESS, function (e) {
        let progress = e.currentPosition / e.duration * 100;
        document.getElementById('trackProgress').style.width = progress + '%';
    });
});


//         document.addEventListener('DOMContentLoaded', function () {
//         const playButtons = document.querySelectorAll('.play-song img') || [];

//             playButtons.forEach(button => {
//                 button.addEventListener('click', function () {
//                     const songId = this.getAttribute('data-song');
//                     const audio = document.getElementById(`audio-${songId}`);
//                     const progressBar = document.getElementById(`progress-${songId}`);

//                     if (audio.paused) {
//                         document.querySelectorAll('.audio').forEach(otherAudio => {
//                             if (otherAudio !== audio) {
//                                 otherAudio.pause();
//                                 otherAudio.previousElementSibling.src = "{{ asset('images/play.png') }}";
//                             }
//                         });

//                         audio.play();
//                         this.src = "{{ asset('images/pause.png') }}";

//                         audio.ontimeupdate = function () {
//                             const percentage = (audio.currentTime / audio.duration) * 100;
//                             progressBar.style.width = percentage + "%";
//                         };
//                     } else {
//                         audio.pause();
//                         this.src = "{{ asset('images/play.png') }}";
//                     }
//                 });
//             });
//         });

//         const audioPlayer = document.getElementById('audio-player');
// const audioSource = document.getElementById('audio-source');
// const playPauseBtn = document.getElementById('play-pause');
// const progressBar = document.getElementById('progress-bar');
// let currentSongIndex = 0;
// let songElements = document.querySelectorAll('.song-card');

// function playSong(songUrl) {
//     audioSource.src = songUrl;
//     audioPlayer.load();
//     audioPlayer.play();
//     playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
// }

// songElements.forEach((songCard, index) => {
//     songCard.addEventListener('click', function() {
//         currentSongIndex = index;
//         let songUrl = this.getAttribute('data-song');
//         playSong(songUrl);
//     });
// });

// audioPlayer.addEventListener('timeupdate', function() {
//     let progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
//     progressBar.style.width = progress + "%";
// });

// playPauseBtn.addEventListener('click', function() {
//     if (audioPlayer.paused) {
//         audioPlayer.play();
//         playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
//     } else {
//         audioPlayer.pause();
//         playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
//     }
// });

// document.getElementById('next-song').addEventListener('click', function() {
//     currentSongIndex = (currentSongIndex + 1) % songElements.length;
//     playSong(songElements[currentSongIndex].getAttribute('data-song'));
// });

// document.getElementById('prev-song').addEventListener('click', function() {
//     currentSongIndex = (currentSongIndex - 1 + songElements.length) % songElements.length;
//     playSong(songElements[currentSongIndex].getAttribute('data-song'));
// });