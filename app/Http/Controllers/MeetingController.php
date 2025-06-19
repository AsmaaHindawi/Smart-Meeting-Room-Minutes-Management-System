<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function index()
    {
        return response()->json(Meeting::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'agenda' => 'required|string',
        ]);

        $meeting = Meeting::create($validated);

        return response()->json($meeting, 201);
    }

    public function show($id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return response()->json(['message' => 'Meeting not found'], 404);
        }

        return response()->json($meeting, 200);
    }

    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return response()->json(['message' => 'Meeting not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'agenda' => 'required|string',
        ]);

        $meeting->update($validated);

        return response()->json($meeting, 200);
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return response()->json(['message' => 'Meeting not found'], 404);
        }

        $meeting->delete();

        return response()->json(['message' => 'Meeting deleted'], 200);
    }
}
