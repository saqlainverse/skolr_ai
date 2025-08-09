@extends('pak-dev.layouts.main')

@section('page-title')
    @include('pak-dev.components.page_title', ['total_students' => $total_students])
@endsection

@section('content')
    {{-- Only include this once --}}
    @include('pak-dev.components.categories', ['categories' => $top_course_categories])

    @foreach($sections as $section)
        @if($section->section === 'top_courses')
            @include('pak-dev.components.course')
        @endif
        @if($section->section === 'fun_fact')
            @include('pak-dev.components.about_box', compact('section'), [
                'total_instructors' => $total_instructors,
                'language_count' => $language_count,
                'total_videos' => $total_videos,
                'count_courses' => $count_courses,
                'total_enrollment' => $total_enrollment,
            ])
        @endif

        @if($section->section === 'become_instructor' && (!Auth::check() || auth()->user()->role_id == 3))
            @include('pak-dev.components.become_instructor', compact('section'))
            @include('frontend.homePage.become_instructor')
        @endif
    @endforeach
    @include('pak-dev.components.search_tags', ['tags' => $tags])

    {{-- Static sections (once only) --}}
    @include('pak-dev.components.video_box')
    @include('pak-dev.components.icon')
    @include('pak-dev.components.event')
    @include('pak-dev.components.testimonial')

    {{-- Dynamic sections (based on $sections) --}}

@endsection
