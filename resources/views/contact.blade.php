@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-10">
    <h2 class="text-3xl font-bold text-green-600 mb-4">Contact Us</h2>

    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <input type="text" name="name" placeholder="Your Name"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        <input type="email" name="email" placeholder="Your Email"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        
            <input type="text" name="subject" placeholder="Subject"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        <textarea name="message" rows="4" placeholder="Your Message"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>

        <button type="submit"
            class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Send Message</button>

    </form>
</div>
@endsection
