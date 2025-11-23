@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header"><h5>Create Student</h5></div>
  <div class="card-body">
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" 
               class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email') }}" 
               class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
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
        <input name="father_name" value="{{ old('father_name') }}" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Mother's Name</label>
        <input name="mother_name" value="{{ old('mother_name') }}" class="form-control">
      </div>
      
      <div class="mb-3">
        <label for="picture" class="form-label">Profile Picture</label>
        <input type="file" name="picture" 
               class="form-control @error('picture') is-invalid @enderror" accept="image/*">
        @error('picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button class="btn btn-primary">Submit</button>
      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
      
    </form>
  </div>
</div>
@endsection
