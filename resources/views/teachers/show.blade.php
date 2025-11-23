@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Teacher Details</h2>

    <p><strong>Name:</strong> {{ $teacher->name }}</p>
    <p><strong>Email:</strong> {{ $teacher->email }}</p>
    <p><strong>Subject:</strong> {{ $teacher->subject }}</p>
    <!-- <p><strong>Password:</strong> {{ $teacher->password }}</p> -->
    <p><strong>Profile Picture:</strong><br>
        @if($teacher->profile_picture)
            <img src="{{ asset($teacher->profile_picture) }}" width="100">
        @else
           <img src="{{ asset('profile_pictures/proxy-image.jpeg') }}" 
                                 alt="No Image" width="50" height="50" 
                                 style="object-fit: cover; border-radius: 50%;">
        @endif
    </p>


   <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Edit</a>

    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
