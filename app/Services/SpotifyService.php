<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;

class SpotifyService
{
    protected $clientId;
    protected $clientSecret;
    protected $token;

    public function __construct()
    {
        $this->clientId = env('SPOTIFY_CLIENT_ID');
        $this->clientSecret = env('SPOTIFY_CLIENT_SECRET');
        $this->token = $this->getAccessToken();
    }

    // 1️⃣ Get Access Token
    public function getAccessToken()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode("{$this->clientId}:{$this->clientSecret}")
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->failed()) {
            throw new \Exception("Spotify API Authentication Failed: " . $response->body());
        }
        return $response->json()['access_token'];
    }
    public function getAuthUrl()
    {
        $scopes = 'streaming user-read-email user-read-private user-modify-playback-state';
        $redirectUri = url('/callback');
        
        return 'https://accounts.spotify.com/authorize?' . http_build_query([
            'client_id' => $this->clientId,
            'response_type' => 'code',
            'scope' => $scopes,
            'redirect_uri' => $redirectUri,
        ]);
    }

    public function getUserToken($code)
    {
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => url('/callback'),
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        return $response->json();
    }
    // 2️⃣ Search Track
    public function searchTrack($query)
    {
        if (!$this->token) {
            $this->getAccessToken();
        }
    
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->token}"
        ])->get("https://api.spotify.com/v1/search", [
            'q' => $query,
            'type' => 'track',
            'limit' => 20
        ]);
    
        $data = $response->json();
    
        // ✅ Validate if 'items' exist before returning
        if (!isset($data['tracks']['items']) || empty($data['tracks']['items'])) {
            return ['error' => 'No tracks found for this search.'];
        }
    
        return $data;
    }
    public function playTrack($trackId, $deviceId)
    {
        if (!$this->token) {
            $this->getAccessToken();
        }
    
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->token}"
        ])->put("https://api.spotify.com/v1/me/player/play?device_id={$deviceId}", [
            'uris' => ["spotify:track:{$trackId}"]
        ]);
    
        if ($response->failed()) {
            throw new \Exception("Failed to play track: " . $response->body());
        }
    
        return $response->json();
    }
}
