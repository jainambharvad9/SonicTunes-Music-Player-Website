<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SoundCloudService;

class SoundCloudController extends Controller
{
    protected $soundCloudService;

    public function __construct(SoundCloudService $soundCloudService)
    {
        $this->soundCloudService = $soundCloudService;
    }

    public function search(Request $request)
    {
        $track = $request->input('track');
        $results = $this->soundCloudService->searchTrack($track);

        // Debug API Response
        if (isset($results['error'])) {
            return view('welcome', ['results' => [], 'error' => $results['error']]);
        }

        return view('welcome', ['results' => $results]);
    }
}
