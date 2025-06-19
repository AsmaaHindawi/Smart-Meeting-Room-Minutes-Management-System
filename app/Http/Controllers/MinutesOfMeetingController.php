<?php

namespace App\Http\Controllers;

use App\Models\MinutesOfMeeting;
use Illuminate\Http\Request;

class MinutesOfMeetingController extends Controller
{
    public function index()
    {
        return response()->json(MinutesOfMeeting::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'action_items' => 'required|string',
            'discussion_points' => 'required|string',
            'decisions' => 'required|string',
            'file_url' => 'nullable|string',
        ]);

        $mom = MinutesOfMeeting::create($validated);
        return response()->json($mom, 201);
    }

    public function show($id)
    {
        $mom = MinutesOfMeeting::find($id);
        if (!$mom) {
            return response()->json(['message' => 'Minutes not found'], 404);
        }
        return response()->json($mom, 200);
    }

    public function update(Request $request, $id)
    {
        $mom = MinutesOfMeeting::find($id);
        if (!$mom) {
            return response()->json(['message' => 'Minutes not found'], 404);
        }

        $validated = $request->validate([
            'action_items' => 'required|string',
            'discussion_points' => 'required|string',
            'decisions' => 'required|string',
            'file_url' => 'nullable|string',
        ]);

        $mom->update($validated);
        return response()->json($mom, 200);
    }

    public function destroy($id)
    {
        $mom = MinutesOfMeeting::find($id);
        if (!$mom) {
            return response()->json(['message' => 'Minutes not found'], 404);
        }

        $mom->delete();
        return response()->json(['message' => 'Minutes deleted'], 200);
    }
}

