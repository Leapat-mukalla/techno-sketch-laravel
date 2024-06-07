<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\VisitorsData;
use Auth;
use App\Http\Controllers\Visitor\VisitorController;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            // return redirect()->action('VisitorController@index');
            return redirect()->action([VisitorController::class, 'index']);

        }
        // Get the first (and presumably only) event from the database
        $event = Event::first();
        $visitorCount = VisitorsData::count();

        return view('landing-page', compact('event','visitorCount'));

    }
    public function status()
    {

        // Count the likes from the likes table
        $likesCount = Like::count();
        // Count the users from the VisitorsData table
        $visitorCount = VisitorsData::count();

        // Pass the likes count to the view
        return view('status', compact('likesCount', 'visitorCount'));
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
