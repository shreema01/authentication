@extends('layouts.app')

@section('content')
<div class="container">
    
  <h2>Add New Teacher</h2>

    <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
        
      @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            
          <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
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
            <label>Subject:</label>
            <input type="text" name="subject" class="form-control">
        </div>

        <div class="mb-3">
            <label>Profile Picture:</label>
            <input type="file" name="profile_picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
