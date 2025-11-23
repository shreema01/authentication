@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header"><h5>Edit Student</h5></div>
  <div class="card-body">
    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name', $student->name) }}" 
               class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email', $student->email) }}" 
               class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Password (leave blank to keep current)</label>
        <input type="password" name="password" 
               class="form-control @error('password') is-invalid @enderror">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Father's Name</label>
        <input name="father_name" value="{{ old('father_name', $student->father_name) }}" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Mother's Name</label>
        <input name="mother_name" value="{{ old('mother_name', $student->mother_name) }}" class="form-control">
      </div>

      <div class="mb-3">
        <label for="picture" class="form-label">Profile Picture</label><br>
        
        @if($student->profile_picture)
            <img src="{{ asset('storage/' . $student->profile_picture) }}" width="80" class="mb-2">
        @endif
        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" accept="image/*">
        @error('picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button class="btn btn-primary">Update</button>
      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
  </div>
</div>
@endsection
