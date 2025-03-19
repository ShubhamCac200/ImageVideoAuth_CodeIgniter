<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Search extends Controller
{
    private $apiKeyImage = '49425991-8075c293d229733eea11d454e';
    private $apiKeyVideo = '49425991-8075c293d229733eea11d454e';

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('search', ['results' => null, 'query' => '', 'type' => 'photo', 'error' => '']);    }

    public function fetch()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']);
        $query = $this->request->getPost('query');
        $type = $this->request->getPost('type') ?? 'photo'; // Default to images

        if (!$query) {
            return redirect()->back()->with('error', 'Search query is required');
        }

        if ($type === 'video') {
            $apiKey = $this->apiKeyVideo;
            $url = "https://pixabay.com/api/videos/?key={$apiKey}&q=" . urlencode($query);
        } else {
            $apiKey = $this->apiKeyImage;
            $url = "https://pixabay.com/api/?key={$apiKey}&q=" . urlencode($query) . "&image_type=photo";
        }

        try {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new \Exception('Failed to fetch data from Pixabay');
            }

            $results = json_decode($response, true);
            return view('search', [
                'results' => $results['hits'] ?? [],
                'query' => $query,
                'type' => $type,
                'error' => empty($results['hits']) ? 'No results found.' : ''
            ]);
        } catch (\Exception $e) {
            return view('search', [
                'results' => [],
                'query' => $query,
                'type' => $type,
                'error' => 'Error fetching results. Please try again.'
            ]);
        }
    }
}
