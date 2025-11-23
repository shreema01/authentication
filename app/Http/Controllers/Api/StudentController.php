<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // List all students
    public function index()
    {
        $students = Student::all()->map(function ($student) {
            $student->profile_picture_url = $student->profile_picture 
                ? asset('storage/'.$student->profile_picture) 
                : null;
            return $student;
        });

        return response()->json(['success' => true, 'data' => $students], 200);
    }

    // Create new student
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:students,email',
            'password'        => 'required|min:6',
            'father_name'     => 'nullable|string|max:255',
            'mother_name'     => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $student = Student::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'father_name'     => $request->father_name,
            'mother_name'     => $request->mother_name,
            'profile_picture' => $path,
        ]);

        $student->profile_picture_url = $path ? asset('storage/'.$path) : null;

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    // Show single student
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found'], 404);
        }

        $student->profile_picture_url = $student->profile_picture 
            ? asset('storage/'.$student->profile_picture) 
            : null;

        return response()->json(['success' => true, 'data' => $student], 200);
    }

//  Update student----new

public function update(Request $request, $id)
{
    $student = Student::find($id);

    if (!$student) {
        return response()->json([
            'success' => false,
            'message' => 'Student not found'
        ], 404);
    }

    $request->validate([
        'name'            => 'sometimes|required|string|max:255',
        'email'           => 'sometimes|required|email|unique:students,email,' . $id,
        'father_name'     => 'nullable|string|max:255',
        'mother_name'     => 'nullable|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {

       
        if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
            Storage::disk('public')->delete($student->profile_picture);
        }

      
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $student->profile_picture = $path;
    }

    $student->fill($request->only(['name', 'email', 'father_name', 'mother_name']));
    $student->save();

    $student->profile_picture_url = $student->profile_picture
        ? asset('storage/' . $student->profile_picture)
        : asset('storage/public/proxy-image.jpeg'); 

    return response()->json([
        'success' => true,
        'message' => 'Student updated successfully',
        'data' => $student
    ], 200);
}


    // Delete student
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found'], 404);
        }

        if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
            Storage::disk('public')->delete($student->profile_picture);
        }

        $student->delete();

        return response()->json(['success' => true, 'message' => 'Student deleted successfully'], 200);
    }
}
