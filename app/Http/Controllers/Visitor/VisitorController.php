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
        // Get the current user's ID
        $userId = Auth::id();

        // Query the visitors_scans table to check if the current user's ID exists
        $visitorScan = VisitorsScan::where('user_id', $userId)->exists();
        if ($visitorScan) {
            return view('visitors-scan');
        }
        $from = [12, 35, 251]; // RGB values for the start color (#0c23fb)
        $to = [89, 135, 255];  // RGB values for the end color (#5987ff)

        // Generate the QR code with a gradient background
        $qrCode = QrCode::size(200)
                        ->style('dot')
                        ->eye('circle')
                        ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                        ->margin(1)
                        ->generate(auth()->id());


        return view('visitors-home', compact('qrCode','event','visitorScan'));
    }

    public function getUpdatedVisitorsScan()
    {
        // Get the current user's ID
        $userId = Auth::id();

        // Query the visitors_scans table to check if the current user's ID exists
        $visitorScan = VisitorsScan::where('user_id', $userId)->exists();

        // Return the updated data as JSON
        return response()->json(['visitorScan' => $visitorScan]);
    }
    public function getArtworkDetails(Request $request)
    {
        $artworkId = $request->input('artworkId');
        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return response()->json(['error' => 'Artwork not found'], 404);
        }

        // Check if the authenticated user has liked the artwork
        $likedByUser = false;
        // $userId = Auth::id();
        $user = auth()->user();
        $like = Like::where('user_id',$user->id )
                    ->where('artwork_id', $artworkId)
                    ->first();
        if ($like) {
            $likedByUser = true;
        }
        // $likedByUser = auth()->user()->likes()->where('artwork_id', $artworkId)->exists();

        return response()->json(['artwork' => $artwork, 'likedByUser' => $likedByUser]);

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
        $artwork = Artwork::findOrFail($id);
        return view('artworkDetails', ['artwork' => $artwork]);
    }

    public function scanShow()
    {
        return view('visitors-scan');
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
