@extends('frontend.layouts.master')
@section('title', __('course'))
@section('content')
    <!--====== Start Course Video Section ======-->
    <section class="course-video-section p-t-50 p-b-100 p-t-sm-30">
        <div class=" ">
            <div class="row" id="courseRow" style="display: flex; flex-wrap: wrap;">
                <div class="col-lg-4 col-md-5 col-12 order-2 order-md-1" id="infoCol" style="border-right: 1px solid #eee; background: #f9f9f9;">
                    <div class="p-4" style="position: sticky; top: 30px;">
                        <!-- Course Title -->
                        <h2 class="fw-bold mb-3 fz-26" style="color:#2c3e50;">
                            {{ $course->title }}
                        </h2>
                        <!-- Course Meta -->
                        <div class="mb-4">
                            <span class="badge bg-primary me-2">{{ __('Type:') }} {{ ucfirst($course->course_type ?? 'General') }}</span>
                            @if($course->created_at)
                                <span class="text-muted">{{ __('Published:') }} {{ $course->created_at->format('M d, Y') }}</span>
                            @endif
                        </div>
                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="fw-semibold mb-2">{{ __('Description') }}</h5>
                            <div class="text-muted" style="font-size: 1rem;">
                                {!! $course->description ?? __('No description available.') !!}
                            </div>
                        </div>
                        <!-- Tabs (Curriculum / Resource) -->
                        <ul class="nav nav-pills mb-3" id="courseTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="curriculum-tab" data-bs-toggle="pill" data-bs-target="#curriculum" type="button" role="tab" aria-controls="curriculum" aria-selected="true">
                                    {{ __('Curriculum') }}
                                </button>
                            </li>
                            @if(count($my_resource) > 0)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="resource-tab" data-bs-toggle="pill" data-bs-target="#resource" type="button" role="tab" aria-controls="resource" aria-selected="false">
                                        {{ __('Resource') }}
                                    </button>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="courseTabContent">
                            <!-- Curriculum Tab -->
                            <div class="tab-pane fade show active" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                <div class="accordion" id="curriculumAccordion">
                                    @if (count($sections) > 0)
                                        @foreach ($sections as $key => $section)
                                            <div class="accordion-item mb-2" style="border-radius: 8px; overflow: hidden;">
                                                <h2 class="accordion-header" id="sectionHeading{{ $key }}">
                                                    <button class="accordion-button {{ isset($selected_lesson) && $selected_lesson->section_id == $section->id ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSection{{ $key }}" aria-expanded="{{ isset($selected_lesson) && $selected_lesson->section_id == $section->id ? 'true' : 'false' }}" aria-controls="collapseSection{{ $key }}">
                                                        {{ $section->title }}
                                                    </button>
                                                </h2>
                                                <div id="collapseSection{{ $key }}" class="accordion-collapse collapse {{ isset($selected_lesson) && $selected_lesson->section_id == $section->id ? 'show' : '' }}" aria-labelledby="sectionHeading{{ $key }}" data-bs-parent="#curriculumAccordion">
                                                    <div class="accordion-body p-2" style="background: #fff;">
                                                        <ul class="list-group list-group-flush">
                                                            @if ($section->lessons->count() > 0)
                                                                @foreach ($section->lessons as $lesson)
                                                                    <li class="list-group-item p-2 {{ $lesson->slug == request()->route()->parameter('slug') ? 'active text-black' : '' }}" style="cursor:pointer;">
                                                                        <a href="{{ route('lesson.details', ['course' => $course->slug, 'slug' => $lesson->slug]) }}" class="d-flex align-items-center text-decoration-none">
                                                                            @if ($lesson->lesson_type == 'video')
                                                                                <i class="bi bi-play-circle me-2 text-success"></i>
                                                                            @elseif($lesson->lesson_type == 'audio')
                                                                                <i class="bi bi-volume-up me-2 text-warning"></i>
                                                                            @elseif($lesson->lesson_type == 'doc')
                                                                                <i class="bi bi-file-earmark-text me-2 text-info"></i>
                                                                            @endif
                                                                            <span class="flex-grow-1 text-black">{{ $lesson->title }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            @endif

                                                            @if ($section->quizzes->count() > 0)
                                                                @foreach ($section->quizzes as $quiz)
                                                                    <li class="list-group-item p-2">
                                                                        <a href="{{ route('my-quiz', $quiz->slug) }}" class="d-flex align-items-center text-decoration-none">
                                                                            <i class="bi bi-question-circle me-2 text-danger"></i>
                                                                            <span>{{ $quiz->title }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-warning">{{ __('No Lesson Found!') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!-- Resources Tab -->
                            <div class="tab-pane fade" id="resource" role="tabpanel" aria-labelledby="resource-tab">
                                <div class="accordion" id="resourceAccordion">
                                    @if(count($my_resource) > 0)
                                        @foreach($my_resource as $key => $resource)
                                            <div class="accordion-item mb-2">
                                                <h2 class="accordion-header" id="resourceHeading{{ $key }}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseResource{{ $key }}" aria-expanded="false" aria-controls="collapseResource{{ $key }}">
                                                        {{ $resource->title }}
                                                    </button>
                                                </h2>
                                                <div id="collapseResource{{ $key }}" class="accordion-collapse collapse" aria-labelledby="resourceHeading{{ $key }}" data-bs-parent="#resourceAccordion">
                                                    <div class="accordion-body">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <span class="text-muted">{{ ltrim($resource->source, 'files/') }}</span>
                                                            </div>
                                                            <a href="{{ route('download.resource', $resource->id) }}" class="btn btn-sm btn-outline-primary">
                                                                {{ __('Download') }} <i class="bi bi-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">{{ __('No resources available') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7 col-12 order-1 order-md-2 d-flex align-items-start justify-content-center" id="videoCol">
                    <div class="w-100 p-4" style="background: #fff; border-radius: 12px; min-height: 480px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
                        @include('frontend/components/new_ai_teacher')
                    </div>
                </div>
                <!-- /Video Player Column -->
            </div>
        </div>
    </section>
    <!--====== End Course Video Section ======-->
    <!--====== End Course Video Section ======-->
@endsection
@push('js')
    <script>
        let start_time = 0;
        let total_duration = 0;
        let is_playing = false;
        let total_watched_time = 0;

        const videoElement = document.getElementById('player').querySelector('video');

        console.log(videoElement)
        if (videoElement) {
            videoElement.currentTime = $('.video_block').data('progress');
        }
        const audioElement = document.getElementById('audio_payer');

        if (audioElement) {
            const audioElemSelector = audioElement.querySelector('audio');
            audioElement.currentTime = $('.audio_block').data('progress');
        }

        const onPlay = (target) => {
            is_playing = true;
            start_time = new Date().getTime();
            saveProgress(target);
        }
        const onLoad = (target) => {
            alert('loaded');
        }

        const onPause = (target) => {
            if (is_playing) {
                is_playing = false;
                let current_time = new Date().getTime();
                let elapsed_seconds = (current_time - start_time) / 1000;
                total_watched_time += elapsed_seconds;
            }
            saveProgress(target);
        }

        const onEnded = (target) => {
            if (is_playing) {
                is_playing = false;
                let current_time = new Date().getTime();
                let elapsed_seconds = (current_time - start_time) / 1000;
                total_watched_time += elapsed_seconds;
            }
            saveProgress(target);
        }

        const timeUpdate = (target) => {
            total_duration = target.duration;
        }

        const saveProgress = (target) => {

            var dataset = {
                course_id: $(target).data('course_id'),
                section_id: $(target).data('section_id'),
                lesson_id: $(target).data('lesson_id'),
                total_spent_time: total_watched_time,
                total_duration: total_duration
            }

            $.ajax({
                url: "{{ route('save-progress') }}",
                type: "POST",
                data: dataset,
                success: function (response) {
                },
                error: function (error) {
                    console.log(error.responseText)
                }

            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const tabButtons = document.querySelectorAll('#education-level-tab button');
            const curriculumTabContent = document.getElementById('myTabContent');
            const tabSection = document.getElementById('tabSection');
            const collapseButton = document.getElementById('collapseTabButton');
            const sidebarCol = document.getElementById('sidebarCol');
            const videoCol = document.getElementById('videoCol');
            const collapseTabIcon = document.getElementById('collapseTabIcon');
            const collapseTabText = document.getElementById('collapseTabText');
            const collapseChevron = document.getElementById('collapseChevron');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (curriculumTabContent) {
                        curriculumTabContent.style.display = 'none';
                    }
                });
            });

            collapseButton.addEventListener('click', () => {
                if (sidebarCol.style.display !== 'none') {
                    sidebarCol.style.display = 'none';
                    videoCol.classList.remove('col-lg-8');
                    videoCol.classList.add('col-12');
                    collapseTabText.textContent = '';
                    collapseChevron.innerHTML = '';
                    collapseChevron.setAttribute('viewBox', '0 0 24 24');
                    collapseChevron.innerHTML = '<path stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>';
                } else {
                    sidebarCol.style.display = '';
                    videoCol.classList.remove('col-12');
                    videoCol.classList.add('col-lg-8');
                    collapseTabText.textContent = '';
                    collapseChevron.innerHTML = '';
                    collapseChevron.setAttribute('viewBox', '0 0 24 24');
                    collapseChevron.innerHTML = '<path stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>';
                }
            });
        });

        $(document).ready(function () {
            var player = new Plyr('#player');

            player.on('play', function () {
                // saveProgress($('#player'));
                is_playing = true;
                start_time = new Date().getTime();
            });
            player.on('ended', function () {
                if (is_playing) {
                    is_playing = false;
                    let current_time = new Date().getTime();
                    let elapsed_seconds = (current_time - start_time) / 1000;
                    total_watched_time += elapsed_seconds;
                }
                saveProgress($('#player'));
            });
            player.on('pause', function () {
                if (is_playing) {
                    is_playing = false;
                    let current_time = new Date().getTime();
                    let elapsed_seconds = (current_time - start_time) / 1000;
                    total_watched_time += elapsed_seconds;
                }
                saveProgress($('#player'));
            });

            player.on('timeupdate', function (time) {
                total_duration = time.detail.plyr.duration;
            });
            player.on('ready', function (time) {
                time.detail.plyr.currentTime = $('#player').data('progress');
            });
        });
    </script>
    @if ($course->heygen_avatar_url)
    <div id="heygen-loader"
         style="position: fixed; bottom: 40px; left: 40px; width: 200px; height: 200px; z-index: 10000; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.9); border-radius: 50%; box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.12);">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    @endif
@endpush
@if ($course->heygen_avatar_url)
    @push('js')

        {!! $course->heygen_avatar_url !!}

        <script>
            window.addEventListener("message", function (e) {
                const host = "https://labs.heygen.com";
                if (e.origin === host && e.data && e.data.type === "streaming-embed" && e.data.action === "init") {
                    const loader = document.getElementById("heygen-loader");
                    if (loader) loader.style.display = "none";
                }
            });
        </script>
    @endpush
@endif
{{-- @push('css')
<style>
  .avatar-container {
    width: 100vw;
    height:100vh;
    position: fixed;
    top: 0;
    left: 0;
  }
  .avatar-container iframe {
    width: 100%;
    height: 100%;
    border: none;
  }
</style>

@endpush --}}
{{-- @push('js')
    <script>
        ! function(window) {
            const host = "https://labs.heygen.com",
                url = host +
                "/guest/streaming-embed?share=eyJxdWFsaXR5IjoiaGlnaCIsImF2YXRhck5hbWUiOiJNYXJpYW5uZV9Qcm9mZXNzaW9uYWxMb29r%0D%0AX3B1YmxpYyIsInByZXZpZXdJbWciOiJodHRwczovL2ZpbGVzMi5oZXlnZW4uYWkvYXZhdGFyL3Yz%0D%0AL2UzMmQ3ZDEwNDdhMjRjMzRhNzBjNTRjMmI3NzQ0MWMwXzU1ODkwL3ByZXZpZXdfdGFyZ2V0Lndl%0D%0AYnAiLCJuZWVkUmVtb3ZlQmFja2dyb3VuZCI6dHJ1ZSwia25vd2xlZGdlQmFzZUlkIjoiNTJiOTli%0D%0AMjUzM2YyNDhiMmI3Mzc3N2ZkOThiZGI0OGIiLCJ1c2VybmFtZSI6IjQ0NzA0NDI0NzBkMjRmMDZi%0D%0ANzViMWMwNWU3NjhlYjllIn0%3D&inIFrame=1"
            // const host = "https://labs.heygen.com",
            //     url = host +
            //     "/guest/streaming-embed?share=eyJxdWFsaXR5IjoiaGlnaCIsImF2YXRhck5hbWUiOiJKdW5lX0hSX3B1YmxpYyIsInByZXZpZXdJbWciOiJodHRwczovL2ZpbGVzMi5oZXlnZW4uYWkvYXZhdGFyL3YzLzc0NDQ3YTI3ODU5YTQ1NmM5NTVlMDFmMjFlZjE4MjE2XzQ1NjIwL3ByZXZpZXdfdGFsa18xLndlYnAiLCJuZWVkUmVtb3ZlQmFja2dyb3VuZCI6ZmFsc2UsImtub3dsZWRnZUJhc2VJZCI6ImU5MWFiM2MxOGQ4ZDQ2ZTdhZTAyOTUzYWNkOWZiMTlhIiwidXNlcm5hbWUiOiI1Nzc3YmJiZjJlMDk0ODk4Yjc4MzFkOWJjZjcxYWU4NSJ9&inIFrame=1";

            const embedTarget = document.getElementById("heygen-embed-wrapper");
            if (!embedTarget) return;

            const container = document.createElement("div");
            container.id = "heygen-streaming-container";
            container.style.position = "absolute";
            container.style.top = "0";
            container.style.left = "0";
            container.style.right = "0";
            container.style.bottom = "0";
            container.style.width = "100%";
            container.style.height = "100%";
            container.style.borderRadius = "10px";
            container.style.overflow = "hidden";

            const iframe = document.createElement("iframe");
            iframe.allowFullscreen = true;
            iframe.title = "Streaming Embed";
            iframe.role = "dialog";
            iframe.allow = "microphone";
            iframe.src = url;
            iframe.style.width = "100%";
            iframe.style.height = "100%";
            iframe.style.border = "0";

            container.appendChild(iframe);
            embedTarget.appendChild(container);
        }(globalThis);
    </script>
@endpush --}}

