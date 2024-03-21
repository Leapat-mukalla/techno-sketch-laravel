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
        try {
            $userId = $request->input('userId');

            // Create a new visitor scan entry
            VisitorsScan::create([
                'user_id' => $userId,
            ]);
            // return redirect()->back()->with('success', 'تم إضافة الحدث بنجاح.');
            return response()->json(['message' => 'Visitor scan created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create visitor scan'], 500);
            // return response()->json(['error' => $e->getMessage()], 500);
            // return redirect()->back()->with('error', $e->getMessage());

        }
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
