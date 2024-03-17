<?php

namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisitorsScan;
class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reception-home');
    }

    public function checkUserId(Request $request)
    {
        $userId = $request->input('userId');

        // Check if the user with the given ID exists
        $userExists = User::where('id', $userId)->exists();

        return response()->json(['exists' => $userExists]);
    }

    public function createVisitorScan(Request $request)
    {
        $userId = $request->input('userId');

        // Create a new visitor scan entry
        VisitorScan::create([
            'user_id' => $userId,
            // You can add more fields here if needed
        ]);

        return response()->json(['message' => 'Visitor scan created successfully']);
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
