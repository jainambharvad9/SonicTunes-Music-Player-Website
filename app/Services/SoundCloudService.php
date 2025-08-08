<?php 

// namespace App\Services;

// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Log;

// class SoundCloudService
// {
//     protected $clientId;

//     public function __construct()
//     {
//         $this->clientId = env('SOUNDCLOUD_CLIENT_ID');

//         if (empty($this->clientId)) {
//             Log::error("❌ SoundCloud API Client ID is missing.");
//             throw new \Exception("SoundCloud API Client ID is missing.");
//         }
//     }

//     public function searchTrack($query)
// {
//     if (empty($this->clientId)) {
//         return ['error' => 'SoundCloud API Client ID is missing.'];
//     }

//     try {
//         $url = "https://api-v2.soundcloud.com/search/tracks?q={$query}&client_id={$this->clientId}&limit=20";
//         Log::info("🔍 Fetching SoundCloud API: " . $url);

//         $response = Http::get($url);

//         if ($response->failed()) {
//             Log::error("❌ SoundCloud API request failed: " . $response->body());
//             return ['error' => 'SoundCloud API request failed.'];
//         }

//         $data = $response->json();

//         if (!isset($data['collection']) || empty($data['collection'])) {
//             return ['error' => 'No tracks found.'];
//         }

//         return collect($data['collection'])->map(function ($track) {
//             return [
//                 'id' => $track['id'],
//                 'title' => $track['title'],
//                 'artist' => $track['user']['username'],
//                 'artwork_url' => $track['artwork_url'] ?? asset('images/default-album.jpg'),
//                 'permalink_url' => $track['permalink_url'], // Direct SoundCloud link
//                 'is_streamable' => $track['streamable'] ?? false, // ✅ Check if playable
//                 'stream_url' => $track['streamable'] ? $this->getStreamUrl($track['id']) : null // ✅ Get stream URL only if playable
//             ];
//         })->filter(function ($track) {
//             return $track['is_streamable']; // ✅ Filter only streamable tracks
//         })->values()->toArray(); // ✅ Remove gaps in array keys

//     } catch (\Exception $e) {
//         Log::error("⚠ Failed to fetch SoundCloud data: " . $e->getMessage());
//         return ['error' => 'Failed to fetch data.'];
//     }
// }
//     // 🔥 **NEW: Get Playable URL from SoundCloud**
//     private function getStreamUrl($trackId)
//     {
//         $streamUrl = "https://api-v2.soundcloud.com/tracks/{$trackId}/stream?client_id={$this->clientId}";
//         Log::info("🎵 Fetching Playable URL: " . $streamUrl);

//         $response = Http::get($streamUrl);
//         if ($response->failed()) {
//             Log::error("⚠ Failed to get stream URL for track ID {$trackId}");
//             return null;
//         }

//         $data = $response->json();
//         return $data['url'] ?? null;
//     }
// }
