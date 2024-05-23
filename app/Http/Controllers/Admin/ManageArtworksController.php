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
    public function index(Request $request)
    {
        // Check if a sorting request is provided
        if ($request->has('sort_by')) {
            // Sorting request is provided
            $sortBy = $request->input('sort_by');

            // Retrieve artworks with likes count
            $artworksQuery = DB::table('artworks')
                ->leftJoin('likes', 'artworks.id', '=', 'likes.artwork_id')
                ->select('artworks.*', DB::raw('COUNT(likes.artwork_id) as like_count'))
                ->groupBy('artworks.id');

            // Apply sorting based on the selected option
            if ($sortBy === 'more') {
                $artworksQuery->orderByDesc('like_count');
            } else if ($sortBy === 'less') {
                $artworksQuery->orderBy('like_count');
            }

            // Paginate the sorted artworks
            $artworks = $artworksQuery->paginate(10);
        } else {
            // No sorting request provided, default to sorting by date
            $artworks = DB::table('artworks')
                ->leftJoin('likes', 'artworks.id', '=', 'likes.artwork_id')
                ->select('artworks.*', DB::raw('COUNT(likes.artwork_id) as like_count'))
                ->groupBy('artworks.id')
                // ->orderByDesc('created_at') // Default sorting by date
                ->paginate(10);
        }

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
                'artwork_photo' => 'required|image|mimes:jpeg,png,jpg',
                'artist' => 'required|string',
                'artist_photo' => 'required|image|mimes:jpeg,png,jpg',
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
                'artwork_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
                'artist_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
            ]);
           // Begin a database transaction
           DB::beginTransaction();

           // Handle artwork_photo upload
           $artworkFile = $request->file('artwork_photo');
           $artworkFilename = $this->generateFilename($request->title, $request->artist, $artworkFile->getClientOriginalExtension());

            // Store the artwork_photo file in the storage directory
            Storage::disk('s3')->putFileAs('', $artworkFile, $artworkFilename);

           // Handle artist_photo upload
           $artistFile = $request->file('artist_photo');
           $artistFilename = $this->generateArtistFilename($request->artist, $artistFile->getClientOriginalExtension());

           // Store the artist_photo file in the storage directory
            Storage::disk('s3')->putFileAs('', $artistFile, $artistFilename);


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
                Storage::disk('s3')->delete([$artworkFilename, $artistFilename]);


            }
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة العمل. يرجى المحاولة مرة أخرى.');
            // return redirect()->back()->with('error', $e->getMessage());

        }
    }
    private function generateFilename($title, $artist, $extension)
    {
        $uniqueIdentifier = uniqid();
        // Generate a unique filename based on title, artist, and unique identifier
        return "artwork_{$uniqueIdentifier}_{$title}_{$artist}.{$extension}";
    }

    private function generateArtistFilename($artist, $extension)
    {
        $uniqueIdentifier = uniqid();
        // Generate a unique filename based on artist and unique identifier
        return "artist_{$uniqueIdentifier}_{$artist}.{$extension}";
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
    public function update(Request $request, $id)
    {
        // Begin a database transaction
        DB::beginTransaction();

        try {
            $artwork = Artwork::findOrFail($id);

            // Validate the request
            $request->validate([
                'title' => 'required|string',
                'artwork_photo' => 'nullable|image|mimes:jpeg,png,jpg',
                'artist' => 'required|string',
                'artist_photo' => 'nullable|image|mimes:jpeg,png,jpg',
                'description' => 'required|string',
            ], [
                'title.required' => 'يرجى إدخال العنوان.',
                'artist.required' => 'يرجى إدخال اسم الفنان.',
                'description.required' => 'يرجى إدخال وصف العمل.',
                'title.string' => 'يجب أن يكون العنوان نصًا.',
                'artwork_photo.image' => 'يجب أن تكون صورة العمل من نوع صورة.',
                'artist.string' => 'يجب أن يكون اسم الفنان نصًا.',
                'artist_photo.image' =>'يجب أن تكون صورة الفنان من نوع صورة.',
                'description.string' => 'يجب أن يكون الوصف نصًا.',
                'artwork_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
                'artist_photo.mimes' => 'يجب ان تكون صيغة الصورة احدى هذه الأنواع: jpeg, png, jpg.',
            ]);

            // Update the artwork properties
            $artwork->title = $request->title;
            $artwork->artist = $request->artist;
            $artwork->description = $request->description;

            // Handle the artwork photo
            if ($request->hasFile('artwork_photo')) {
                // Delete the previous artwork photo
                if ($artwork->artwork_photo) {
                    Storage::disk('s3')->delete($artwork->artwork_photo);
                }
                // Upload and store the new artwork photo
                $artwork->artwork_photo = $request->file('artwork_photo')->store('', 's3');

            }

            // Handle the artist photo
            if ($request->hasFile('artist_photo')) {
                // Delete the previous artist photo
                if ($artwork->artist_photo) {
                    Storage::disk('s3')->delete($artwork->artist_photo);

                }
                // Upload and store the new artist photo
                $artwork->artist_photo = $request->file('artist_photo')->store('', 's3');
            }

            // Save the updated artwork
            $artwork->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('admin.artworks.index')->with('success', 'تم تعديل العمل بنجاح.');

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Delete uploaded files
            if (isset($artwork) && $artwork->artwork_photo) {
                // Storage::disk('public')->delete('artwork_photos/' . $artwork->artwork_photo);
                Storage::disk('artwork_photos')->delete($artwork_photo);
            }
            if (isset($artwork) && $artwork->artist_photo) {
                // Storage::disk('public')->delete('artist_photos/' . $artwork->artist_photo);
                Storage::disk('artist_photos')->delete($artist_photo);
            }

            // Redirect back with error message
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث العمل. يرجى المحاولة مرة أخرى.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Retrieve the artwork by ID
            $artwork = Artwork::findOrFail($id);

            // Delete the associated files from storage
            Storage::disk('s3')->delete($artwork->artist_photo);
            Storage::disk('s3')->delete($artwork->artwork_photo);

            // Delete the artwork record from the database
            $artwork->delete();

            // Commit the transaction if all steps succeed
            DB::commit();

            return redirect()->route('admin.artworks.index')->with('success', 'تم حذف العمل بنجاح.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف العمل. يرجى المحاولة مرة أخرى.');
        }
    }
}
