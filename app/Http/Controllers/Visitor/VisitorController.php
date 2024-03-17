<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Event;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Generate the QR code with the user's ID
        // $qrCode = QrCode::format('png')
        // ->size(300)
        // ->errorCorrection('H')
        // ->merge(asset('assets/images/logo.png'), 0.3, true)
        // ->generate(auth()->id());

        // // Convert the QR code data to a base64 encoded image
        // $qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode);

        // return view('visitors-home', compact('qrCodeData'));
        // $qrCode = QrCode::generate(auth()->id());
        // Get the first (and presumably only) event from the database
        $event = Event::first();

        $from = [12, 35, 251]; // RGB values for the start color (#0c23fb)
        $to = [89, 135, 255];  // RGB values for the end color (#5987ff)

        // Generate the QR code with a gradient background
        $qrCode = QrCode::size(200)
                        ->style('dot')
                        ->eye('circle')
                        ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                        ->margin(1)
                        ->generate(auth()->id());
        return view('visitors-home', compact('qrCode','event'));
    }
    // public function getCountdown()
    // {
    //     // Get the first (and presumably only) event from the database
    //     $event = Event::first();

    //     // Calculate the remaining time until the event starts
    //     $eventDateTime = Carbon::parse($event->start_date . ' ' . $event->start_time);
    //     $now = Carbon::now();
    //     $remainingTime = $eventDateTime->diffInSeconds($now);

    //     return response()->json(['remaining_time' => $remainingTime]);
    // }

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
