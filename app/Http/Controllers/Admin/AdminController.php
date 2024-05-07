<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artwork;
use App\Models\Event;
use App\Models\VisitorsData;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the count of users where is_visitor == true
        $visitorCount = VisitorsData::where('is_visitor', true)->count();

        // Query for artworks with like count
        $artworks = DB::table('artworks')
        ->leftJoin('likes', 'artworks.id', '=', 'likes.artwork_id')
        ->select('artworks.*', DB::raw('COUNT(likes.artwork_id) as like_count'))
        ->groupBy('artworks.id')
        ->orderByDesc('like_count')
        ->get(); // Execute the query and fetch the results
        $events = Event::all();
        $firstEvent = $events->first();
        return view('admin.home', compact('artworks', 'firstEvent','visitorCount'));
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
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
        ]);

        // Create the event
        Event::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'تم إضافة الحدث بنجاح.');
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
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
        ]);

        // Find the event by ID
        $event = Event::findOrFail($id);

        // Update the event details
        $event->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'تم تعديل الحدث بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'تم حذف الحدث بنجاح.');
    }
}
