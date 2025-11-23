<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:students,email',
            'password'     => 'required|min:6|confirmed',
            'father_name'  => 'nullable|string|max:255',
            'mother_name'  => 'nullable|string|max:255',
            'profile_picture'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

       
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profile_pictures', $filename);
            $data['profile_picture'] = 'profile_pictures/' . $filename;
        }

        $data['password'] = Hash::make($data['password']);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update code:with new requirement 
    public function update(Request $request, Student $student)
{
    $data = $request->validate([
        'name'            => 'required|string|max:255',
        'email'           => 'required|email|unique:students,email,' . $student->id,
        'password'        => 'nullable|min:6|confirmed',
        'father_name'     => 'nullable|string|max:255',
        'mother_name'     => 'nullable|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    
    if ($request->hasFile('picture')) {
     
        if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
            Storage::disk('public')->delete($student->profile_picture);
        }

        $path = $request->file('picture')->store('profile_pictures', 'public');
        $data['profile_picture'] = $path;
    }

   
    if (!empty($data['password'])) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']);
    }

 
    $student->update($data);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

    public function destroy(Student $student)
    {
        
        if ($student->profile_picture && Storage::exists('public/' . $student->profile_picture)) {
            Storage::delete('public/' . $student->profile_picture);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
