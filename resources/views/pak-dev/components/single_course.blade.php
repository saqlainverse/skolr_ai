<div class="course-item h240 hover-img">
    <div class="features image-wrap">
        <img class="lazyload"
             data-src="{{ getFileLink('295x248', $course->image ?? null) }}"
             src="{{ getFileLink('295x248', $course->image ?? null) }}" alt="{{ $course->title ?? '' }}"/>
        <div class="box-wishlist tf-action-btns">
            <i class="flaticon-heart"></i>
        </div>
    </div>
    <div class="content">
        <div class="meta">
            <div class="meta-item">
                <i class="flaticon-calendar"></i>
                <p>{{ $course->total_lesson ?? 0 }} {{ __('Lessons') }}</p>
            </div>
            <a href="#" class="meta-item">
                <i class="flaticon-user"></i>
                <p>{{ $course->total_enrolled ?? 0 }} {{ __('Students') }}</p>
            </a>
            <div class="meta-item">
                <i class="flaticon-clock"></i>
                <p>{{ $course->duration ?? '-' }}</p>
            </div>
        </div>
        <h5 class="fw-5 line-clamp-2">
            <a href="{{ route('course.details', $course->slug) }}">{{ $course->title ?? '' }}</a>
        </h5>
        <div class="bottom">
            <div class="h5 price fw-5">$89.29</div>
            <a href="/login" class="tf-btn-arrow"><span
                        class="fw-5 h6">Enroll Course</span>
                <i class="icon-arrow-top-right"></i></a>
        </div>
    </div>
</div>

