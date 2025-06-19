<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(Notification::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'is_seen' => 'boolean',
        ]);

        $notification = Notification::create($validated);
        return response()->json($notification, 201);
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        return response()->json($notification, 200);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'is_seen' => 'boolean',
        ]);

        $notification->update($validated);
        return response()->json($notification, 200);
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->delete();
        return response()->json(['message' => 'Notification deleted'], 200);
    }
}
