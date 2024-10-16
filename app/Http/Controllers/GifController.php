<?php

namespace App\Http\Controllers;

use App\Http\Requests\GifIdRequest;
use App\Http\Requests\GifRequest;
use App\Models\Gif;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GifController extends Controller
{

    private $gifBaseUrl;
    private $apikey;

    public function __construct()
    {
        $this->gifBaseUrl = 'https://api.giphy.com/v1/gifs/';
        $this->apikey = env('GIPHY_API_KEY');
    }

    public function searchGifs(GifRequest $request): JsonResponse
    {
        $query = $request->get('query', '');
        $limit = $request->get('limit', 10);
        $offset = $request->get('offset', 0);

        $url = $this->gifBaseUrl . 'search/tags?api_key=' . $this->apikey . '&q=' . $query . '&limit=' . $limit . '&offset=' . $offset;

        $response = Http::get($url);

        if ($response->successful()) {
            return $this->sendResponse($response->json(), 'Búsqueda realizada con éxito');
        }

        return response()->json([
            'success' => false,
            'message' => 'No se pudo realizar la búsqueda en Giphy',
        ], 500);
    }

    public function getGifById($id): JsonResponse
    {
        $response = Http::get($this->gifBaseUrl . $id . '?api_key=' . $this->apikey);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        }

        return response()->json(['error' => 'Gif not found'], 404);
    }

    public function StoreFavoriteGif(GifRequest $request): JsonResponse
    {
        $request->validate([
            'gif_id' => 'required|numeric',
            'alias' => 'required|string',
            'user_id' => 'required|numeric',
        ]);

        try {
            $gif = Gif::create($request->validated());
            return response()->json([
                'success' => true,
                'gif_id' => $gif->id,
                'alias' => $gif->alias,
                'user_id' => $gif->user_id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al agregar GIF a favoritos',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
