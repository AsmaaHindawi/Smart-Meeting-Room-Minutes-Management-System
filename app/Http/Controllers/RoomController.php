<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /api/rooms
     */
    public function index()
    {
        return response()->json([
            'rooms' => Room::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     * Not used in API-only projects.
     */
    public function create()
    {
        return response()->json(['message' => 'Not implemented for API'], 501);
    }

    /**
     * Store a newly created resource in storage.
     * POST /api/rooms
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location'   => 'required|string|max:255',
            'capacity'   => 'required|integer',
            'features'   => 'nullable|string',
            'is_active'  => 'boolean',
        ]);

        $room = Room::create($validated);

        return response()->json([
            'message' => 'Room created successfully.',
            'room'    => $room
        ], 201);
    }

    /**
     * Display the specified resource.
     * GET /api/rooms/{id}
     */
    public function show(Room $room)
    {
        return response()->json([
            'room' => $room
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     * Not used in API-only projects.
     */
    public function edit(Room $room)
    {
        return response()->json(['message' => 'Not implemented for API'], 501);
    }

    /**
     * Update the specified resource in storage.
     * PUT /api/rooms/{id}
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'location'   => 'sometimes|required|string|max:255',
            'capacity'   => 'sometimes|required|integer',
            'features'   => 'nullable|string',
            'is_active'  => 'boolean',
        ]);

        $room->update($validated);

        return response()->json([
            'message' => 'Room updated successfully.',
            'room'    => $room
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /api/rooms/{id}
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json([
            'message' => 'Room deleted successfully.'
        ], 200);
    }
}
