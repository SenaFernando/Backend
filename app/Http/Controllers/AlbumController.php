<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
   
    public function index(): JsonResponse
    {
        $albums = Album::all(); 
        return response()->json($albums); 
    }

    
    public function store(Request $request): JsonResponse
{
    $request->validate([
        'title' => 'required|string|max:255',
        'release_year' => 'required|integer|digits:4',
        'artist' => 'required|string|max:255',
    ]);

    $album = Album::create($request->all());

    return response()->json($album, 201); // Retorna o álbum criado como JSON
}

    
    public function show($id): JsonResponse
    {
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        return response()->json($album); // Retorna o álbum como JSON
    }

    
    public function update(Request $request, $id): JsonResponse
    {
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'release_year' => 'sometimes|integer|digits:4',
            'artist' => 'sometimes|string|max:255',
        ]);

        $album->update($request->only(['title', 'release_year', 'artist']));

        return response()->json($album); // Retorna o álbum atualizado como JSON
    }

    /**
     * Remove the specified album from storage.
     */
    public function destroy($id): JsonResponse
{
    $album = Album::find($id);

    if (!$album) {
        return response()->json(['message' => 'Album not found'], 404);
    }

    $album->delete();

    return response()->json(['message' => 'Album deleted successfully']); // Mensagem de sucesso
}

    /**
     * Display the tracks of the specified album.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function tracks($id): JsonResponse
    {
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $album->load('tracks');

        return response()->json($album->tracks); // Retorna as faixas do álbum como JSON
    }

    /**
     * Search albums and tracks by name.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->input('query');

        if (empty($query)) {
            Log::error('Query parameter is required');
            return response()->json(['message' => 'Query parameter is required'], 400);
        }

        Log::info('Query: ' . $query);

        $albums = Album::where('title', 'like', '%' . $query . '%')->with('tracks')->get();

        Log::info('Albums Found: ' . $albums->count());

        if ($albums->isEmpty()) {
            Log::error('No albums found for query: ' . $query);
            return response()->json(['message' => 'No albums found'], 404);
        }

        Log::info('Albums returned successfully');
        return response()->json($albums);
    }
}