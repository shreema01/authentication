@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Student Details</h5>
  </div>
  <div class="card-body">

    <div class="mb-3">
      <strong>Profile Picture:</strong><br>
      @if($student->profile_picture)
          <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" width="150">
      @else
          
      <img src="{{ asset('storage/proxy-image.jpeg') }}" alt="No Image" width="150">
      
      @endif
    </div>

     <div class="mb-3">

</div>

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Father:</strong> {{ $student->father_name }}</p>
    <p><strong>Mother:</strong> {{ $student->mother_name }}</p>

    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
  </div>
</div>
@endsection
