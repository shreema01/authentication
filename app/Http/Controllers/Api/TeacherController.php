<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Get all teachers (with full image URL)
    public function index()
    {
        $teachers = Teacher::all()->map(function ($teacher) {
            $teacher->profile_picture_url = $teacher->profile_picture
                ? asset($teacher->profile_picture)
                : asset('profile_pictures/proxy-image.jpeg'); 
            return $teacher;
        });

        return response()->json($teachers);
    }

    // Create a new teacher (with profile picture upload)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'subject' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $validated;

        // Handle image upload (same path as web controller)
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('profile_pictures'), $filename);
            $data['profile_picture'] = 'profile_pictures/' . $filename;
        }

        $teacher = Teacher::create($data);

        // Return with full URL
        $teacher->profile_picture_url = $teacher->profile_picture
            ? asset($teacher->profile_picture)
            : asset('profile_pictures/proxy-image.jpeg');

        return response()->json($teacher, 201);
    }

    // Show a single teacher (with full image URL)
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->profile_picture_url = $teacher->profile_picture
            ? asset($teacher->profile_picture)
            : asset('profile_pictures/proxy-image.jpeg');
        return response()->json($teacher);
    }

    // Update a teacher (replace old image)
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:teachers,email,' . $teacher->id,
            'subject' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $validated;

        // Handle new picture upload + old delete
        if ($request->hasFile('profile_picture')) {
            // Delete old image if exists
            if ($teacher->profile_picture && file_exists(public_path($teacher->profile_picture))) {
                unlink(public_path($teacher->profile_picture));
            }

            // Upload new image
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('profile_pictures'), $filename);
            $data['profile_picture'] = 'profile_pictures/' . $filename;
        }

        $teacher->update($data);

        // Return with full image URL
        $teacher->profile_picture_url = $teacher->profile_picture
            ? asset($teacher->profile_picture)
            : asset('profile_pictures/proxy-image.jpeg');

          
        return response()->json($teacher);
    }

    //  Delete a teacher (and remove picture)
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->profile_picture && file_exists(public_path($teacher->profile_picture))) {
            unlink(public_path($teacher->profile_picture));
        }

        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}