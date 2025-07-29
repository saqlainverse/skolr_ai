@extends('layouts.app') {{-- Or adjust to your layout --}}

@section('content')
<div class="container text-center py-5">
    <h1 class="mb-4">AI Teacher</h1>
    <p class="mb-3">Learn from your personalized AI video tutor</p>

    <div id="heygen-container" class="my-4">
        <!-- Embed code will go here -->
        <iframe src="https://your-heygen-url.com/embed/video123" 
                width="640" height="360" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
@endsection
