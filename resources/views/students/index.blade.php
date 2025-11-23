@extends('layouts.app')

@section('title', 'Student List')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Student List</h5>
        <a href="{{ route('students.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Profile Pic</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        @if($student->profile_picture)
                            <img src="{{ asset('storage/' . $student->profile_picture) }}" 
                                 alt="Profile Picture" width="50" height="50" 
                                 style="object-fit: cover; border-radius: 50%;">
                        @else
                            <img src="{{ asset('storage/public/proxy-image.jpeg') }}" 
                                 alt="No Image" width="50" height="50" 
                                 style="object-fit: cover; border-radius: 50%;">
                        @endif
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->mother_name }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">No students found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection
