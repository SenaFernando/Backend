<?php

namespace App\Http\Controllers;

use App\Models\Track; // Importa o modelo Track
use Illuminate\Http\Request;

class TrackController extends Controller
{
    
    public function index()
    {
        $tracks = Track::all(); 
        return response()->json($tracks); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'album_id' => 'required|exists:albums,id',
            'duration' => 'required|integer', // Duração em segundos
        ]);

        $track = Track::create([
            'title' => $request->input('title'),
            'album_id' => $request->input('album_id'),
            'duration' => $request->input('duration'),
        ]);

        return response()->json($track, 201); 
    }

    
    public function show($id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        return response()->json($track); 
    }

    
    public function update(Request $request, $id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'album_id' => 'sometimes|exists:albums,id',
            'duration' => 'sometimes|integer',
        ]);

        $track->update($request->only(['title', 'album_id', 'duration']));

        return response()->json($track); 
    }

    
      
    public function destroy($albumId, $id)
{
    $track = Track::where('id', $id)->where('album_id', $albumId)->first();

    if (!$track) {
        return response()->json(['message' => 'Track not found'], 404);
    }

    $track->delete();

    return response()->json(['message' => 'Track deleted successfully']); // Mensagem de sucesso
}

    public function search(Request $request)
{
    $query = $request->input('query');

    
    $tracks = Track::where('title', 'like', "%$query%")->get();

    return response()->json($tracks); 
}

     public function getTracksByAlbum($albumId)
    {
        $tracks = Track::where('album_id', $albumId)->get();
        return response()->json($tracks);
    }
}