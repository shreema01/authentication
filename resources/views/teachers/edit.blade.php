@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Teacher</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" required>
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
            <label>Subject:</label>
            <input type="text" name="subject" class="form-control" value="{{ $teacher->subject }}">
        </div>

        <div class="mb-3">
            <label>Profile Picture:</label><br>
            @if($teacher->profile_picture)
                <img src="{{ asset($teacher->profile_picture) }}" width="80"><br>
            @endif
            <input type="file" name="profile_picture" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
