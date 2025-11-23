
@extends('layouts.app')

@section('content')
      <form action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
@endsection