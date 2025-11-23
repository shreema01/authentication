@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Teachers</h2>

    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Subject</th>
                <th>Profile Picture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <!-- <td>{{ $teacher->password }}</td> -->
                <td>{{ $teacher->subject }}</td>
                <td>
                    @if($teacher->profile_picture)
                        <img src="{{ asset($teacher->profile_picture) }}" width="60" height="60">
                    @else
                        <img src="{{ asset('profile_pictures/proxy-image.jpeg') }}" 
                                 alt="No Image" width="50" height="50" 
                                 style="object-fit: cover; border-radius: 50%;">
                    @endif
                </td>
                <td>
                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
