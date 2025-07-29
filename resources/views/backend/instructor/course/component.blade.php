@foreach($courses as $course)
    <div class="col-lg-4 col-sm-6">
        <div class="course-item" data-aos="fade-up"
             data-aos-delay="100">
            <a href="#" target="_blank" class="course-item-thumb">
                <img
                    src="{{ getFileLink('324x199',$course->thumbnail) }}"
                    alt="{{ $course->title }}">
                <span
                    class="course-badge">{{__(@$course->category->title) }}</span>
            </a>
            <div class="course-item-body">
                <ul class="course-item-info justify-content-end">
                    <li class="rating-review">
                        <span class="total-review"><i class="las la-star"></i> {{ number_format($course->reviews_avg_rating, 2) }}</span>
                    </li>
                </ul>
                <h4 class="title">
                    <a href="#" target="_blank">{{ $course->title }}</a>
                </h4>
                <ul class="course-item-info">
                    <li>
                        <i class="las la-file-alt"></i> {{ $course->lessons_count }} {{__('lessons') }}
                    </li>
                    <li>
                        <i class="las la-user-friends"></i> {{ $course->enrolls_count }} {{__('enroll') }}
                    </li>
                </ul>
            </div>
            <div class="course-item-footer">
                <div class="course-price">{{ $course->is_free ? __('free') : get_price($course->price, userCurrency()) }}</div>
                <ul>
                    <li>
                        <a href="{{ route('course.details', $course->slug) }}"
                           class="btn btn-sm sg-btn-primary rounded-2">{{__('details') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
