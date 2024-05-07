<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\VisitorsScan;
use Illuminate\Support\Facades\Auth;
use App\Models\Artwork;
use App\Models\Like;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Get the first (and presumably only) event from the database
        $event = Event::first();

        return view('visitors-home', compact('event'));
    }

    public function toggleLikeArtwork(Request $request)
    {
        $user = auth()->user(); // Assuming you have authentication set up

        // Get the artwork ID from the request
        $artworkId = $request->input('artworkId');

        // Check if the user has already liked the artwork
        $existingLike = Like::where('user_id', $user->id)
                            ->where('artwork_id', $artworkId)
                            ->first();

        if ($existingLike) {
            // User has already liked the artwork, so remove the like
            Like::where('user_id', $existingLike->user_id)
            ->where('artwork_id', $existingLike->artwork_id)
            ->delete();

            $liked = false; // Indicate that the artwork is no longer liked
        } else {
            // User hasn't liked the artwork yet, so add a like
            Like::create([
                'user_id' => $user->id,
                'artwork_id' => $artworkId
            ]);
            $liked = true; // Indicate that the artwork is now liked
        }

        // You can return the updated like status as JSON response
        return response()->json(['liked' => $liked]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $likedByUser = auth()->user()->likes()->where('artwork_id', $id)->exists();
        $artwork = Artwork::findOrFail($id);
        $likeCount = $artwork->likes()->count();
        return view('artworkDetails', ['artwork' => $artwork,'likedByUser'=>$likedByUser,'likeCount' => $likeCount]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
