<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Artwork;

class ManageArtworksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artworks = DB::table('artworks')
        ->leftJoin('likes', 'artworks.id', '=', 'likes.artwork_id')
        ->select('artworks.*', DB::raw('COUNT(likes.artwork_id) as like_count'))
        ->groupBy('artworks.id')
        ->paginate(10);

    return view('admin.artworks-main', compact('artworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.new-artwork');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('artwork_photo'), $request->file('artist_photo'));
        $artworkFilename = null;
        $artistFilename = null;

        try {
            $request->validate([
                'title' => 'required|string',
                'artwork_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'artist' => 'required|string',
                'artist_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|string',
            ], [
                'title.required' => 'يرجى إدخال العنوان.',
                'artwork_photo.required' => 'يرجى إدخال صورة العمل.',
                'artist.required' => 'يرجى إدخال اسم الفنان.',
                'artist_photo.required' => 'يرجى إدخال صورة الفنان.',
                'description.required' => 'يرجى إدخال وصف العمل.',

                'title.string' => 'يجب أن يكون العنوان نصًا.',
                'artwork_photo.image' => 'يجب أن تكون صورة العمل من نوع صورة.',
                'artist.string' => 'يجب أن يكون اسم الفنان نصًا.',
                'artist_photo.image' =>'يجب أن تكون صورة الفنان من نوع صورة.',
                'description.string' => 'يجب أن يكون الوصف نصًا.',

                'artwork_photo.max' => 'يجب ألا يتجاوز حجم الصورة 2048 كيلو بات.',
                'artist_photo.max' => 'يجب ألا يتجاوز حجم الصورة 2048 كيلو بات.',

                'artwork_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
                'artist_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
            ]);
           // Begin a database transaction
           DB::beginTransaction();

           // Handle artwork_photo upload
           $artworkFile = $request->file('artwork_photo');
           $artworkFilename = $this->generateFilename($request->title, $request->artist, $artworkFile->getClientOriginalExtension());

           // Store the artwork_photo file in the storage directory
           Storage::disk('public')->putFileAs('artwork_photos', $artworkFile, $artworkFilename);

           // Handle artist_photo upload
           $artistFile = $request->file('artist_photo');
           $artistFilename = $this->generateArtistFilename($request->artist, $artistFile->getClientOriginalExtension());

           // Store the artist_photo file in the storage directory
           Storage::disk('public')->putFileAs('artist_photos', $artistFile, $artistFilename);

           // Create the artwork record in the database
           Artwork::create([
               'title' => $request->title,
               'artist' => $request->artist,
               'artwork_photo' => $artworkFilename, // Save the artwork_photo filename in the database
               'artist_photo' => $artistFilename, // Save the artist_photo filename in the database
               'description' => $request->description,
           ]);
            // Commit the transaction if all steps succeed
            DB::commit();
           return redirect()->route('admin.artworks.index')->with('success', 'تم إضافة العمل بنجاح.');

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            // Storage::delete(['artwork_photos/' . $artworkFilename, 'artist_photos/' . $artistFilename]);
            // Delete uploaded files
            if ($artworkFilename && $artistFilename) {
                Storage::delete(['artwork_photos/' . $artworkFilename, 'artist_photos/' . $artistFilename]);
            }
            // return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة العمل. يرجى المحاولة مرة أخرى.');
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
    private function generateFilename($title, $artist, $extension)
    {
        $uniqueIdentifier = uniqid();
        // Generate a unique filename based on title, artist, and unique identifier
        return "{$uniqueIdentifier}_{$title}_{$artist}.{$extension}";
    }

    private function generateArtistFilename($artist, $extension)
    {
        $uniqueIdentifier = uniqid();
        // Generate a unique filename based on artist and unique identifier
        return "{$uniqueIdentifier}_{$artist}.{$extension}";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
