<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|min:6|confirmed',
            'subject' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('profile_pictures'), $filename);
            $data['profile_picture'] = 'profile_pictures/'.$filename;
        }

        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
{
    
    $request->validate([
        'name'  => 'required',
        'email' => 'required|email|unique:teachers,email,'.$teacher->id,
        'subject' => 'nullable|string',
        'password' => 'nullable|min:6|confirmed', // <- nullable
        'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    
    $data = $request->all();

   
    if ($request->hasFile('profile_picture')) {
        if ($teacher->profile_picture && file_exists(public_path($teacher->profile_picture))) {
            unlink(public_path($teacher->profile_picture));
        }
        $file = $request->file('profile_picture');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('profile_pictures'), $filename);
        $data['profile_picture'] = 'profile_pictures/'.$filename;
    }

    
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']); 
    }

    
    $teacher->update($data);

    return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
}


    public function destroy(Teacher $teacher)
    {
        if ($teacher->profile_picture && file_exists(public_path($teacher->profile_picture))) {
            unlink(public_path($teacher->profile_picture));
        }

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
