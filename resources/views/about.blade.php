@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-10">
    <h2 class="text-3xl font-bold text-blue-600 mb-4">About Us</h2>
    <p class="text-gray-700 leading-relaxed">
        This Laravel project demonstrates user authentication (Login, Register, Dashboard).  
        After login, users can also explore this About Us page to learn more about the system.
    </p>
    <ul class="list-disc pl-6 mt-4 text-gray-700">
        <li>Simple Login & Registration</li>
        <li>Secure Authentication</li>
        <li>Dashboard with User Info</li>
        <li>Extra Pages: About Us & Contact Us</li>
    </ul>
</div>
@endsection
