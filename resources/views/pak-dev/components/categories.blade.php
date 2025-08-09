<section class=" section-categories tf-spacing-1 pt-0 ">
    <div class="tf-container">
        <div class="row">
            <div class="heading-section">
                <h2 class="letter-spacing-1 wow fadeInUp" data-wow-delay="0s">{{__('categories')}}</h2>
                <div class="flex items-center justify-between flex-wrap gap-10">
{{--                    <div class="sub fs-15 wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet--}}
{{--                        elit</div>--}}
{{--                    <a href="/" class="tf-btn-arrow wow fadeInUp" data-wow-delay="0.3s">Show--}}
{{--                        More Categories<i class="icon-arrow-top-right"></i></a>--}}
                </div>
            </div>
            @forelse($top_course_categories as $category)
            <div class="col-lg-4">
                <div class="wrap-icon-box">
                    <div class="icons-box style-2 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="icons">
                            <svg width="26" height="42" viewBox="0 0 26 42" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                {{ $category->icon }}
                            </svg>
                        </div>
                        <div class="content">
                            <h5><a class="fw-5" href="/">{{ $category->title }}</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <tr><td colspan="4">No packages found.</td></tr>
            @endforelse
        </div>
    </div>
</section>
